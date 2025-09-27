<?php

namespace Wahyurejeki\Oalcompiler;

use OALBaseVisitor;

class CompilerMiddleware extends OALBaseVisitor
{
    private $middlewares = [];

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
        foreach ($ctx->block()->statement() as $stmt) {
            $body[] = '    ' . $this->visit($stmt);
        }
        return "public function handle(Request \$req, Closure \$next) {\n" . implode("\n", $body) . "\n    return \$next(\$req);\n}";
    }

    public function getMiddlewares() { return $this->middlewares; }

}