<?php

namespace Wahyurejeki\Oalcompiler\Laravel;

use Wahyurejeki\Oalcompiler\BaseCompiler;

class LaravelRouteCompiler extends BaseCompiler
{
    private $routes = [];
    private $routeData = [];
    private $usedMiddlewares = [];
    private $usedControllers = [];

    public function visitRouteStmt(\Context\RouteStmtContext $ctx)
    {
        $method = $ctx->HTTP_METHOD()->getText();
        $url = trim($ctx->STRING()->getText(), '"');
        $controller = $ctx->controllerRef()->CONTROLLER_METHOD()->getText();

        $mws = [];
        $middleware = '';
        if ($ctx->middlewareList()) {
            $mwsClasses = [];
            foreach ($ctx->middlewareList()->ID() as $m) {
                $name = $m->getText();
                $this->usedMiddlewares[$name] = true;
                $mws[] = $name;
                $mwsClasses[] = "{$name}::class";
            }
            $middleware = "->middleware([" . implode(', ', $mwsClasses) . "])";
        }

        $this->routeData[] = [
            'method' => $method,
            'url' => $url,
            'controller' => $controller,
            'middlewares' => $mws
        ];

        $parts = explode('@', $controller);
        $controllerClass = $parts[0];
        $controllerMethod = $parts[1] ?? 'index';
        $this->usedControllers[$controllerClass] = true;

        $routeCode = "Route::$method('$url', [{$controllerClass}::class, '{$controllerMethod}'])$middleware;";
        $this->routes[] = $routeCode;
        return $routeCode;
    }

    public function getRoutes()
    {
        $imports = ['use Illuminate\Support\Facades\Route;'];
        if (!empty($this->usedControllers)) {
            ksort($this->usedControllers);
            foreach (array_keys($this->usedControllers) as $c) {
                $imports[] = "use App\Http\Controllers\\$c;";
            }
        }
        if (!empty($this->usedMiddlewares)) {
            ksort($this->usedMiddlewares);
            foreach (array_keys($this->usedMiddlewares) as $mw) $imports[] = "use App\Http\Middleware\\$mw;";
        }
        $externalImports = $this->getExternalImportsCode();
        return "<?php\n\n" . implode("\n", $imports) . "\n" . $externalImports . "\n" . implode("\n", $this->routes);
    }

    public function getRouteData() { return $this->routeData; }
}
