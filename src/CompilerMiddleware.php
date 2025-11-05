<?php

namespace Wahyurejeki\Oalcompiler;

use OALBaseVisitor;

class CompilerMiddleware extends OALBaseVisitor
{
    private $middlewares = [];
    private $stmtTranslator;

    public function __construct()
    {
        // Reuse controller visitor to translate statements/expressions consistently
        $this->stmtTranslator = new CompilerController();
    }

    // ================= Middleware =================
    public function visitMiddlewareStmt(\Context\MiddlewareStmtContext $ctx)
    {
        $name = $ctx->ID()->getText();
        $methods = [];
        foreach ($ctx->middlewareMethod() as $m) {
            $methods[] = $this->visit($m);
        }

        $txtMethod = implode("\n\n", $methods);

        $middlewareCode = <<<PHP
<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class $name {
    $txtMethod
}
PHP;

        $this->middlewares[$name] = $middlewareCode;
        return $middlewareCode;
    }

    public function visitMiddlewareMethod(\Context\MiddlewareMethodContext $ctx)
    {
        $body = [];
        $stmts = $ctx->block()->statement();
        if (!is_array($stmts)) { $stmts = [$stmts]; }
        foreach ($stmts as $stmt) {
            $translated = $this->stmtTranslator->visit($stmt);
            if ($translated !== null && $translated !== '') {
                $body[] = '        ' . $translated; // 8 spaces for method indentation
            }
        }
        $bodyCode = implode("\n", $body);
        return "    public function handle(Request \$req, Closure \$next) {\n$bodyCode\n        return \$next(\$req);\n    }";
    }

    public function getMiddlewares() { return $this->middlewares; }

}