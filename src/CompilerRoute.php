<?php

namespace Wahyurejeki\Oalcompiler;

use OALBaseVisitor;

class CompilerRoute extends OALBaseVisitor
{
    private $routes = [];
    // ================= Routes =================
    public function visitRouteStmt(\Context\RouteStmtContext $ctx)
    {
        $method = $ctx->HTTP_METHOD()->getText();
        $url = trim($ctx->STRING()->getText(), '"');
        $controller = $ctx->controllerRef()->CONTROLLER_METHOD()->getText();


        $middleware = '';
        if ($ctx->middlewareList()) {
            $middlewares = [];
            foreach ($ctx->middlewareList()->ID() as $m) {
                $middlewares[] = $m->getText();
            }
            $middleware = "->middleware([" . implode(', ', array_map(fn($x) => "'$x'", $middlewares)) . "])";
        }

        $routeCode = "Route::$method('$url', '$controller')$middleware;";

        $this->routes[] = $routeCode;
        return $routeCode;
    }

    public function getRoutes()
    {
        $txtRoute = <<<PHP
<?php

use Illuminate\Support\Facades\Route;

PHP;

        return $txtRoute."\n". implode("\n", $this->routes);
    }

}