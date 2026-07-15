<?php

namespace Wahyurejeki\Oalcompiler;

use OALBaseVisitor;

class BaseCompiler extends OALBaseVisitor
{
    protected $imports = [];
    protected $requirements = [];

    public function getImports() { return $this->imports; }

    public function getRequirements() { return $this->requirements; }

    public function visitImportStmt($ctx)
    {
        $alias = $ctx->ID()->getText();
        $path = $ctx->idPath()->getText();
        $fullNamespace = str_replace('.', '\\', $path);
        
        $this->imports[$alias] = $fullNamespace;
        return '';
    }

    public function visitRequireStmt($ctx)
    {
        $package = trim($ctx->STRING()->getText(), '"');
        $this->requirements[$package] = $package;
        return '';
    }

    protected function getExternalImportsCode()
    {
        $externalImports = '';
        foreach ($this->imports as $alias => $fullPath) {
            if ($alias === basename(str_replace('\\', '/', $fullPath))) {
                $externalImports .= "use $fullPath;\n";
            } else {
                $externalImports .= "use $fullPath as $alias;\n";
            }
        }
        return $externalImports;
    }

    // ================= Statements =================
    public function visitVarStmt($ctx)
    {
        $varName = '$' . $ctx->ID()->getText();
        $val = $this->visit($ctx->expression());
        
        if (is_string($val) && (str_contains($val, 'new ') || str_contains($val, '->') || str_contains($val, '('))) {
            // If it already contains an assignment to this variable, return it directly
            if (str_starts_with($val, $varName . ' =')) return $val . ';';
            $expr = $val;
        } else {
            $expr = $this->phpCode($val);
        }
        
        return "$varName = $expr;";
    }

    public function visitAssignmentStmt($ctx)
    {
        $varName = '$' . $ctx->ID()->getText();
        $val = $this->visit($ctx->expression());

        if (is_string($val) && (str_contains($val, 'new ') || str_contains($val, '->') || str_contains($val, '('))) {
            if (str_starts_with($val, $varName . ' =')) return $val . ';';
            $expr = $val;
        } else {
            $expr = $this->phpCode($val);
        }

        return "$varName = $expr;";
    }

    public function visitExpressionStmt($ctx)
    {
        $val = $this->visit($ctx->expression());
        if (!$val) return ';';

        $expr = is_string($val) ? $val : $this->phpCode($val);

        if (is_string($expr)) {
            if (preg_match('/^json\(/', $expr)) $expr = str_replace('json(', 'response()->json(', $expr);
            elseif (preg_match('/^html\(/', $expr)) $expr = str_replace('html(', 'response()->html(', $expr);
            elseif (preg_match('/^redirect\(/', $expr)) $expr = str_replace('redirect(', 'redirect(', $expr);
            elseif (preg_match('/^print\(/', $expr)) $expr = str_replace('print(', 'echo ', $expr);
        }

        return "$expr;";
    }

    public function visitReturnStmt($ctx)
    {
        if ($ctx->expression()) {
            $val = $this->visit($ctx->expression());
            $expr = $this->phpCode($val);
            if (is_string($expr) && (preg_match('/^echo\b/', $expr) || preg_match('/^return\b/', $expr))) {
                return $expr . ';';
            }
            return 'return ' . $expr . ';';
        }
        return 'return;';
    }

    public function visitIfStmt($ctx)
    {
        $cond = $this->visit($ctx->expression(0));
        $code = "if ($cond) " . $this->visit($ctx->block(0));

        $elseifCount = count($ctx->ELSEIF());
        for ($i = 0; $i < $elseifCount; $i++) {
            $elseifCond = $this->visit($ctx->expression($i + 1));
            $elseifBody = $this->visit($ctx->block($i + 1));
            $code .= " elseif ($elseifCond) $elseifBody";
        }

        if ($ctx->ELSE()) {
            $elseBody = $this->visit($ctx->block(count($ctx->block()) - 1));
            $code .= " else $elseBody";
        }

        return $code;
    }

    public function visitBlock($ctx)
    {
        $stmts = $ctx->statement();
        if (!is_array($stmts)) $stmts = [$stmts];

        $out = [];
        foreach ($stmts as $stmt) {
            $visited = $this->visit($stmt);
            $out[] = '    ' . (is_array($visited) ? $this->phpCode($visited) . ';' : $visited);
        }
        return "{\n" . implode("\n", $out) . "\n    }";
    }

    public function visitForStmt($ctx)
    {
        $init = $this->visit($ctx->varStmt());
        $cond = $this->visit($ctx->expression());
        $update = $this->visit($ctx->assignmentStmt());
        $body = $this->visit($ctx->block());

        return "for ($init $cond; $update) $body";
    }

    public function visitForeachStmt($ctx)
    {
        $var = '$' . $ctx->ID()->getText();
        $expr = $this->visit($ctx->expression());
        $body = $this->visit($ctx->block());

        return "foreach ($expr as $var) $body";
    }

    public function visitWhileStmt($ctx)
    {
        $cond = $this->visit($ctx->expression());
        $body = $this->visit($ctx->block());

        return "while ($cond) $body";
    }

    public function visitBreakStmt($ctx) { return "break;"; }

    public function visitContinueStmt($ctx) { return "continue;"; }

    public function visitTryCatchStmt($ctx)
    {
        $tryBody = $this->visit($ctx->block(0));
        $catchType = $ctx->ID(0)->getText();
        $catchVar = '$' . $ctx->ID(1)->getText();
        $catchBody = $this->visit($ctx->block(1));

        if ($catchType === 'Exception') $catchType = '\Exception';

        return "try $tryBody catch ($catchType $catchVar) $catchBody";
    }

    public function visitThrowStmt($ctx)
    {
        $type = $ctx->ID()->getText();
        $expr = $ctx->expression() ? $this->visit($ctx->expression()) : '';
        if ($type === 'Exception') $type = '\Exception';
        return "throw new $type($expr);";
    }

    public function visitIdChain($ctx)
    {
        $childCount = $ctx->getChildCount();
        if ($childCount === 0) return '';

        $firstName = $ctx->getChild(0)->getText();
        if (isset($this->imports[$firstName])) {
            $out = $firstName;
        } else {
            if ($firstName === 'req' || $firstName === 'request') {
                $out = '$request';
            } else {
                $out = '$' . $firstName;
            }
        }
        
        for ($i = 1; $i < $childCount; $i++) {
            $child = $ctx->getChild($i);
            $text = $child->getText();
            
            if ($text === '.') {
                $i++;
                if ($i >= $childCount) break;
                $next = $ctx->getChild($i)->getText();
                $connector = ($i === 2 && isset($this->imports[$firstName])) ? "::" : "->";
                
                if ($i + 1 < $childCount && $ctx->getChild($i + 1)->getText() === '(') {
                    $i += 2; // skip (
                    $args = [];
                    if ($i < $childCount && $ctx->getChild($i) instanceof \Context\ArgumentListContext) {
                        $argCtx = $ctx->getChild($i);
                        $exprs = $argCtx->expression();
                        if (!is_array($exprs)) $exprs = [$exprs];
                        foreach ($exprs as $e) $args[] = $this->phpCode($this->visit($e));
                        $i++;
                    }
                    if ($i < $childCount && $ctx->getChild($i)->getText() === ')') $i++;
                    $out .= $connector . $next . "(" . implode(', ', $args) . ")";
                } else {
                    $out .= ($next === 'count') ? $connector . 'count()' : $connector . $next;
                }
            } elseif ($text === '[') {
                $i++;
                if ($i >= $childCount) break;
                $expr = $this->visit($ctx->getChild($i));
                $out .= "[" . $this->phpCode($expr) . "]";
                $i++; // skip expr
                if ($i < $childCount && $ctx->getChild($i)->getText() === ']') $i++;
            }
        }
        return $out;
    }

    public function visitResponseFunction($ctx)
    {
        $name = $ctx->getChild(0)->getText();
        $args = [];
        if ($ctx->argumentList()) {
            $exprs = $ctx->argumentList()->expression();
            if (!is_array($exprs)) $exprs = [$exprs];
            foreach ($exprs as $e) $args[] = $this->visit($e);
        }

        if ($name === 'render') {
            $exprs = $ctx->expression();
            if (!is_array($exprs)) $exprs = [$exprs];
            $viewName = trim($this->visit($exprs[0]), "\"'");
            $data = isset($exprs[1]) ? $this->visit($exprs[1]) : [];
            
            if (method_exists($this, 'generateBladeFile')) {
                $this->generateBladeFile($viewName);
            }

            $dataCode = is_string($data) && str_starts_with($data, '$') ? $data : $this->phpCode($data);
            return 'view(\'' . $viewName . '\', ' . $dataCode . ')';
        }

        $prepared = $this->prepareArgs($args);
        switch ($name) {
            case 'getPost': return '$request->input(' . implode(', ', $prepared) . ')';
            case 'json': return 'response()->json(' . implode(', ', $prepared) . ')';
            case 'html': return 'response()->html(' . implode(', ', $prepared) . ')';
            case 'redirect': return 'redirect(' . implode(', ', $prepared) . ')';
            case 'print': return 'echo ' . implode(' . ', $prepared);
            default: return '';
        }
    }

    public function visitNewExpr($ctx)
    {
        $className = $ctx->ID()->getText();
        $args = [];
        if ($ctx->argumentList()) {
            $exprs = $ctx->argumentList()->expression();
            if (!is_array($exprs)) $exprs = [$exprs];
            foreach ($exprs as $e) $args[] = $this->phpCode($this->visit($e));
        }
        return "new $className(" . implode(', ', $args) . ")";
    }

    protected function prepareArgs($args)
    {
        $out = [];
        foreach ($args as $a) {
            if (is_string($a) && (str_contains($a, '$') || str_contains($a, ' . ') || (str_starts_with(trim($a), '"') && str_ends_with(trim($a), '"')) || (str_starts_with(trim($a), "'") && str_ends_with(trim($a), "'")))) {
                $out[] = $a;
            } else {
                $out[] = $this->phpCode($a);
            }
        }
        return $out;
    }

    protected function pluralize($word)
    {
        $word = trim($word);
        if (str_ends_with(strtolower($word), 'y')) return substr($word, 0, -1) . 'ies';
        if (str_ends_with(strtolower($word), 's')) return $word;
        return $word . 's';
    }

    public function visitFunctionCall($ctx)
    {
        $name = $ctx->ID()->getText();
        $args = [];
        if ($ctx->argumentList()) {
            $exprs = $ctx->argumentList()->expression();
            if (!is_array($exprs)) $exprs = [$exprs];
            foreach ($exprs as $e) $args[] = $this->visit($e);
        }
        $prepared = $this->prepareArgs($args);
        switch ($name) {
            case 'getPost': return '$request->input(' . implode(', ', $prepared) . ')';
            case 'json': return 'response()->json(' . implode(', ', $prepared) . ')';
            case 'html': return 'response()->html(' . implode(', ', $prepared) . ')';
            case 'redirect': return 'redirect(' . implode(', ', $prepared) . ')';
            case 'print': return 'echo ' . implode(' . ', $prepared);
            default: return $name . '(' . implode(', ', $prepared) . ')';
        }
    }

    public function visitArrayLiteral($ctx)
    {
        $elements = $ctx->arrayElement();
        if (!is_array($elements)) $elements = [$elements];
        $out = [];
        foreach ($elements as $el) {
            $val = $this->visit($el);
            if (is_array($val) && count($val) === 2 && is_string($val[0])) {
                $out[$val[0]] = $val[1];
            } else {
                $out[] = $val;
            }
        }
        return $out;
    }

    public function visitArrayElement($ctx)
    {
        $exprs = $ctx->expression();
        if (!is_array($exprs)) $exprs = [$exprs];
        if (count($exprs) === 2) {
            $key = $this->visit($exprs[0]);
            $val = $this->visit($exprs[1]);
            return [$key, $val];
        }
        return $this->visit($exprs[0]);
    }

    public function visitAtom($ctx)
    {
        if ($ctx->STRING()) return $ctx->STRING()->getText();
        elseif ($ctx->NUMBER()) return $ctx->NUMBER()->getText();
        elseif ($ctx->getText() === 'true') return 'true';
        elseif ($ctx->getText() === 'false') return 'false';
        elseif ($ctx->getText() === 'null') return 'null';
        if ($ctx->responseFunction()) return $this->visitResponseFunction($ctx->responseFunction());
        if ($ctx->sessionFunction()) return $this->visitSessionFunction($ctx->sessionFunction());
        if ($ctx->cookieFunction()) return $this->visitCookieFunction($ctx->cookieFunction());
        if ($ctx->idChain()) return $this->visit($ctx->idChain());
        if ($ctx->functionCall()) return $this->visit($ctx->functionCall());
        return parent::visitAtom($ctx);
    }

    public function visitSessionFunction($ctx)
    {
        $name = $ctx->getChild(0)->getText();
        if ($name === 'getSession') {
            return 'session()->get(' . $this->phpCode($this->visit($ctx->expression(0))) . ')';
        }
        if ($name === 'removeSession') {
            return 'session()->forget(' . $this->phpCode($this->visit($ctx->expression(0))) . ')';
        }
        // setSession(key, value)
        return 'session()->put(' . $this->phpCode($this->visit($ctx->expression(0))) . ', ' . $this->phpCode($this->visit($ctx->expression(1))) . ')';
    }

    public function visitCookieFunction($ctx)
    {
        $name = $ctx->getChild(0)->getText();
        if ($name === 'getCookie') {
            return 'request()->cookie(' . $this->phpCode($this->visit($ctx->expression(0))) . ')';
        }
        if ($name === 'setCookie') {
            return 'setcookie(' . $this->phpCode($this->visit($ctx->expression(0))) . ', ' . $this->phpCode($this->visit($ctx->expression(1))) . ')';
        }
        if ($name === 'removeCookie') {
            return 'Cookie::queue(Cookie::forget(' . $this->phpCode($this->visit($ctx->expression(0))) . '))';
        }
        return 'setcookie(' . $this->phpCode($this->visit($ctx->expression(0))) . ', null, time() - 3600)';
    }

    public function visitExpression($ctx) { return $this->visit($ctx->logicalOrExpr()); }
    public function visitLogicalOrExpr($ctx) { return $this->visitBinaryExpr($ctx); }
    public function visitLogicalAndExpr($ctx) { return $this->visitBinaryExpr($ctx); }
    public function visitEqualityExpr($ctx) { return $this->visitBinaryExpr($ctx); }
    public function visitRelationalExpr($ctx) { return $this->visitBinaryExpr($ctx); }

    public function visitAdditiveExpr($ctx)
    {
        if ($ctx->getChildCount() === 1) return $this->visit($ctx->getChild(0));
        $out = $this->visit($ctx->getChild(0));
        for ($i = 1; $i < $ctx->getChildCount(); $i += 2) {
            $op = $ctx->getChild($i)->getText();
            $right = $this->visit($ctx->getChild($i + 1));
            if ($op === '+') {
                $isString = (strpos($out, '"') !== false || strpos($out, "'") !== false || strpos($right, '"') !== false || strpos($right, "'") !== false);
                $out .= $isString ? ' . ' . $right : ' + ' . $right;
            } else { $out .= ' ' . $op . ' ' . $right; }
        }
        return $out;
    }

    public function visitMultiplicativeExpr($ctx) { return $this->visitBinaryExpr($ctx); }

    protected function visitBinaryExpr($ctx)
    {
        if ($ctx->getChildCount() === 1) return $this->visit($ctx->getChild(0));
        $out = "";
        for ($i = 0; $i < $ctx->getChildCount(); $i++) {
            $child = $ctx->getChild($i);
            if ($child instanceof \Antlr\Antlr4\Runtime\Tree\TerminalNode) { $out .= " " . $child->getText() . " "; }
            else { $out .= $this->visit($child); }
        }
        return $out;
    }

    public function visitUnaryExpr($ctx)
    {
        if ($ctx->getChildCount() === 2 && $ctx->getChild(0)->getText() === '!') {
            $inner = $this->visit($ctx->unaryExpr());
            return '!' . '(' . $inner . ')';
        }
        if (method_exists($ctx, 'atom') && $ctx->atom() !== null) return $this->visit($ctx->atom());
        return parent::visitUnaryExpr($ctx);
    }

    protected function phpValue($value)
    {
        if (is_null($value)) return 'null';
        if (is_bool($value)) return $value ? 'true' : 'false';
        if (is_string($value)) {
            $trim = trim($value);
            if ((str_starts_with($trim, '"') && str_ends_with($trim, '"')) || (str_starts_with($trim, "'") && str_ends_with($trim, "'"))) return $trim;
            if (preg_match('/^\$[a-zA-Z_][a-zA-Z0-9_\->]*$/', $trim)) return $trim;
            
            // If it contains expressions or complex logic, don't quote
            if (strpbrk($trim, '+-*/%.=><![]()')) return $trim;

            $lower = strtolower($trim);
            if (in_array($lower, ['true', 'false', 'null'], true)) return $lower;
            if (is_numeric($trim)) return $trim;
            return '"' . addslashes($value) . '"';
        }
        return (string)$value;
    }

    protected function phpCode($value)
    {
        if (is_array($value)) {
            $keys = array_keys($value);
            $isAssoc = $keys !== array_keys($keys);
            $parts = [];
            foreach ($value as $k => $v) {
                $parts[] = $isAssoc ? $this->phpCode($k) . ' => ' . $this->phpCode($v) : $this->phpCode($v);
            }
            return '[' . implode(', ', $parts) . ']';
        }
        return $this->phpValue($value);
    }
}
