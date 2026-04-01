<?php

namespace Wahyurejeki\Oalcompiler\Express;

use Wahyurejeki\Oalcompiler\BaseCompiler;

class ExpressBaseCompiler extends BaseCompiler
{
    // Override to remove '$' from variables in JS
    public function visitVarStmt($ctx)
    {
        $varName = $ctx->ID()->getText();
        $val = $this->visit($ctx->expression());
        $expr = $this->jsCode($val);
        return "let $varName = $expr;";
    }

    public function visitAssignmentStmt($ctx)
    {
        $varName = $ctx->ID()->getText();
        $val = $this->visit($ctx->expression());
        $expr = $this->jsCode($val);
        return "$varName = $expr;";
    }

    public function visitIdChain($ctx)
    {
        $ids = $ctx->ID();
        if (!is_array($ids)) $ids = [$ids];
        
        $out = $ids[0]->getText(); // No '$' in JS
        
        for ($i = 1; $i < count($ids); $i++) {
            $name = $ids[$i]->getText();
            $isMethod = false;
            $parent = $ctx;
            for ($j = 0; $j < $parent->getChildCount(); $j++) {
                if ($parent->getChild($j)->getText() === $name) {
                    if ($j + 1 < $parent->getChildCount() && $parent->getChild($j + 1)->getText() === '(') {
                        $isMethod = true;
                        $args = [];
                        if ($j + 2 < $parent->getChildCount() && $parent->getChild($j + 2) instanceof \Context\ArgumentListContext) {
                            $argCtx = $parent->getChild($j + 2);
                            $exprs = $argCtx->expression();
                            if (!is_array($exprs)) $exprs = [$exprs];
                            foreach ($exprs as $e) $args[] = $this->jsCode($this->visit($e));
                        }
                        $out .= "." . $name . "(" . implode(', ', $args) . ")";
                        break;
                    }
                }
            }
            if (!$isMethod) {
                $out .= ($name === 'count') ? '.length' : '.' . $name;
            }
        }
        return $out;
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
        $prepared = $this->prepareArgsJS($args);
        
        switch ($name) {
            case 'print': return 'console.log(' . implode(' + ', $prepared) . ')';
            case 'json': return 'res.json(' . implode(', ', $prepared) . ')';
            case 'redirect': return 'res.redirect(' . implode(', ', $prepared) . ')';
            default: return $name . '(' . implode(', ', $prepared) . ')';
        }
    }

    public function visitAdditiveExpr($ctx)
    {
        if ($ctx->getChildCount() === 1) return $this->visit($ctx->getChild(0));
        $out = $this->visit($ctx->getChild(0));
        for ($i = 1; $i < $ctx->getChildCount(); $i += 2) {
            $op = $ctx->getChild($i)->getText();
            $right = $this->visit($ctx->getChild($i + 1));
            // In JS, '+' is always used for both addition and concatenation
            $out .= ' ' . $op . ' ' . $right;
        }
        return $out;
    }

    public function visitExpressionStmt($ctx)
    {
        $val = $this->visit($ctx->expression());
        if (!$val) return ';';

        $expr = is_string($val) ? $val : $this->jsCode($val);
        return "$expr;";
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

        $prepared = $this->prepareArgsJS($args);

        switch ($name) {
            case 'json':
                return 'res.json(' . implode(', ', $prepared) . ')';
            case 'print':
                return 'console.log(' . implode(' + ', $prepared) . ')';
            case 'redirect':
                return 'res.redirect(' . implode(', ', $prepared) . ')';
            case 'render':
                $viewName = trim($this->jsCode($args[0] ?? ''), "\"'");
                $data = $prepared[1] ?? '{}';
                return "res.render('$viewName', $data)";
            default:
                return '';
        }
    }

    public function visitReturnStmt($ctx)
    {
        if ($ctx->expression()) {
            $val = $this->visit($ctx->expression());
            return 'return ' . $this->jsCode($val) . ';';
        }
        return 'return;';
    }

    public function visitBlock($ctx)
    {
        $stmts = $ctx->statement();
        if (!is_array($stmts)) $stmts = [$stmts];

        $out = [];
        foreach ($stmts as $stmt) {
            $visited = $this->visit($stmt);
            $out[] = '    ' . (is_array($visited) ? $this->jsCode($visited) . ';' : $visited);
        }
        return "{\n" . implode("\n", $out) . "\n    }";
    }

    protected function prepareArgsJS($args)
    {
        $out = [];
        foreach ($args as $a) {
            $out[] = $this->jsCode($a);
        }
        return $out;
    }

    protected function jsCode($value)
    {
        if (is_array($value)) {
            $keys = array_keys($value);
            $isAssoc = $keys !== array_keys($keys);
            if ($isAssoc) {
                $parts = [];
                foreach ($value as $k => $v) {
                    $kClean = trim($this->jsCode($k), "\"'");
                    $parts[] = "$kClean: " . $this->jsCode($v);
                }
                return '{ ' . implode(', ', $parts) . ' }';
            } else {
                $parts = array_map([$this, 'jsCode'], $value);
                return '[' . implode(', ', $parts) . ']';
            }
        }
        
        if (is_string($value)) {
            $trim = trim($value);
            // Don't quote if it's already quoted or looks like a variable/method call
            if ((str_starts_with($trim, '"') && str_ends_with($trim, '"')) ||
                (str_starts_with($trim, "'") && str_ends_with($trim, "'")) ||
                preg_with_parentheses($trim) || 
                preg_match('/^[a-zA-Z_][a-zA-Z0-9_\.]*$/', $trim)) {
                return $trim;
            }
            return '"' . addslashes($value) . '"';
        }
        
        return (string)$value;
    }
}

function preg_with_parentheses($str) {
    return str_contains($str, '(') && str_contains($str, ')');
}
