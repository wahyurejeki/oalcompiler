<?php

namespace Wahyurejeki\Oalcompiler\Laravel;

use Wahyurejeki\Oalcompiler\BaseCompiler;

class LaravelRouteCompiler extends BaseCompiler
{
    private $routes = [];
    private $routeData = [];
    private $usedMiddlewares = [];

    public function visitRouteStmt(\Context\RouteStmtContext $ctx)
    {
        $method = $ctx->HTTP_METHOD()->getText();
        $url = trim($ctx->STRING()->getText(), '"');
        $controller = $ctx->controllerRef()->CONTROLLER_METHOD()->getText();

        $this->routeData[] = [
            'method' => $method,
            'url' => $url,
            'controller' => $controller
        ];

        $middleware = '';
        if ($ctx->middlewareList()) {
            $mws = [];
            foreach ($ctx->middlewareList()->ID() as $m) {
                $name = $m->getText();
                $this->usedMiddlewares[$name] = true;
                $mws[] = "{$name}::class";
            }
            $middleware = "->middleware([" . implode(', ', $mws) . "])";
        }

        $routeCode = "Route::$method('$url', '$controller')$middleware;";
        $this->routes[] = $routeCode;
        return $routeCode;
    }

    public function getRoutes()
    {
        $imports = ['use Illuminate\Support\Facades\Route;'];
        if (!empty($this->usedMiddlewares)) {
            ksort($this->usedMiddlewares);
            foreach (array_keys($this->usedMiddlewares) as $mw) $imports[] = "use App\Http\Middleware\\$mw;";
        }
        $externalImports = $this->getExternalImportsCode();
        return "<?php\n\n" . implode("\n", $imports) . "\n" . $externalImports . "\n" . implode("\n", $this->routes);
    }

    public function getRouteData() { return $this->routeData; }
}
