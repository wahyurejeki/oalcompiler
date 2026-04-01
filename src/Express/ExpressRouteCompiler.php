<?php

namespace Wahyurejeki\Oalcompiler\Express;

use Wahyurejeki\Oalcompiler\BaseCompiler;

class ExpressRouteCompiler extends BaseCompiler
{
    private $routes = [];
    private $controllers = [];

    public function visitRouteStmt(\Context\RouteStmtContext $ctx)
    {
        $method = strtolower($ctx->HTTP_METHOD()->getText());
        $url = trim($ctx->STRING()->getText(), '"');
        $controllerRef = $ctx->controllerRef()->CONTROLLER_METHOD()->getText();
        
        // Example: ProductController@indexAction
        list($controllerName, $action) = explode('@', $controllerRef);
        
        $this->controllers[$controllerName] = $controllerName;
        
        $routeCode = "router.$method('$url', $controllerName.$action);";
        $this->routes[] = $routeCode;
        
        return $routeCode;
    }

    public function getRoutesCode()
    {
        $importCode = "const express = require('express');\nconst router = express.Router();\n\n";
        
        foreach ($this->controllers as $controller) {
            $importCode .= "const $controller = require('../controllers/$controller');\n";
        }

        $routesCode = implode("\n", $this->routes);
        
        return <<<JS
$importCode

$routesCode

module.exports = router;
JS;
    }
}
