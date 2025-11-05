<?php

namespace Wahyurejeki\Oalcompiler;

use OALBaseVisitor;

class CompilerRoute extends OALBaseVisitor
{
    private $routes = [];
    private $usedMiddlewares = [];
    // ================= Routes =================
    public function visitRouteStmt(\Context\RouteStmtContext $ctx)
    {
        $method = $ctx->HTTP_METHOD()->getText();
        $url = trim($ctx->STRING()->getText(), '"');
        $controller = $ctx->controllerRef()->CONTROLLER_METHOD()->getText();

        // Build middleware references; collect imports
        $middleware = '';
        if ($ctx->middlewareList()) {
            $middlewares = [];
            foreach ($ctx->middlewareList()->ID() as $m) {
                $name = $m->getText();
                // Track used middleware for import
                $this->usedMiddlewares[$name] = true;
                // Use short class name; will be imported at top
                $middlewares[] = "{$name}::class";
            }
            $middleware = "->middleware([" . implode(', ', $middlewares) . "])";
        }

        $routeCode = "Route::$method('$url', '$controller')$middleware;";

        $this->routes[] = $routeCode;
        return $routeCode;
    }

    public function getRoutes()
    {
        $imports = [
            'use Illuminate\\Support\\Facades\\Route;'
        ];
        if (!empty($this->usedMiddlewares)) {
            ksort($this->usedMiddlewares);
            foreach (array_keys($this->usedMiddlewares) as $mw) {
                $imports[] = 'use App\\Http\\Middleware\\' . $mw . ';';
            }
        }

        $txtRoute = "<?php\n\n" . implode("\n", $imports) . "\n";

        return $txtRoute . "\n" . implode("\n", $this->routes);
    }

}