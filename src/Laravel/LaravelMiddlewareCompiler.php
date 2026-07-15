<?php

namespace Wahyurejeki\Oalcompiler\Laravel;

use Wahyurejeki\Oalcompiler\BaseCompiler;

class LaravelMiddlewareCompiler extends BaseCompiler
{
    private $middlewares = [];

    public function visitMiddlewareStmt(\Context\MiddlewareStmtContext $ctx)
    {
        $name = $ctx->ID()->getText();
        $methods = [];
        foreach ($ctx->middlewareMethod() as $m) $methods[] = $this->visit($m);

        $txtMethod = implode("\n\n", $methods);
        $externalImports = $this->getExternalImportsCode();

        $middlewareCode = <<<PHP
<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
$externalImports

class $name {
    $txtMethod
}
PHP;
        $this->middlewares[$name] = $middlewareCode;
        return $middlewareCode;
    }

    public function visitMiddlewareMethod(\Context\MiddlewareMethodContext $ctx)
    {
        $bodyCode = $this->visit($ctx->block());
        $bodyCode = preg_replace('/\}\s*$/', "    return \$next(\$request);\n    }", $bodyCode);
        return "    public function handle(Request \$request, Closure \$next) $bodyCode";
    }

    public function getMiddlewares() { return $this->middlewares; }
}
