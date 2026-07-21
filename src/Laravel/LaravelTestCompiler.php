<?php

namespace Wahyurejeki\Oalcompiler\Laravel;

use Wahyurejeki\Oalcompiler\BaseCompiler;

class RequestPropertyScanner extends \OALBaseVisitor
{
    private $properties = [];

    public function visitIdChain($ctx)
    {
        $childCount = $ctx->getChildCount();
        if ($childCount >= 3) {
            $firstName = $ctx->getChild(0)->getText();
            if ($firstName === 'req' || $firstName === 'request') {
                if ($ctx->getChild(1)->getText() === '.') {
                    $propName = $ctx->getChild(2)->getText();
                    $this->properties[$propName] = true;
                }
            }
        }
        return parent::visitIdChain($ctx);
    }

    public function getProperties()
    {
        return array_keys($this->properties);
    }
}

class QueryModelScanner extends \OALBaseVisitor
{
    private $queryModels = [];

    public function visitModelMethodCall($ctx)
    {
        $modelName = $ctx->ID()->getText();
        $method = $ctx->MODEL_METHOD()->getText();

        if (in_array($method, ['modelFindOne', 'modelFindAll', 'modelUpdate', 'modelDelete'])) {
            $this->queryModels[$modelName] = true;
        }
        return parent::visitModelMethodCall($ctx);
    }

    public function getQueryModels()
    {
        return array_keys($this->queryModels);
    }
}

class ProgramMiddlewareScanner extends \OALBaseVisitor
{
    private $sessionMiddlewares = [];
    private $tokenMiddlewares = [];

    public function visitMiddlewareStmt($ctx)
    {
        $name = $ctx->ID()->getText();
        if (str_contains($ctx->getText(), 'getSession')) {
            $this->sessionMiddlewares[$name] = true;
        }
        if (str_contains($ctx->getText(), 'token')) {
            $this->tokenMiddlewares[$name] = true;
        }
        return parent::visitMiddlewareStmt($ctx);
    }

    public function getSessionMiddlewares()
    {
        return array_keys($this->sessionMiddlewares);
    }

    public function getTokenMiddlewares()
    {
        return array_keys($this->tokenMiddlewares);
    }
}

class LaravelTestCompiler extends BaseCompiler
{
    private $modelMetadata = [];
    private $routeData = [];
    private $tests = [];
    private $sessionMiddlewares = [];
    private $tokenMiddlewares = [];
    private $scanned = false;

    public function visit(\Antlr\Antlr4\Runtime\Tree\ParseTree $tree): mixed
    {
        if (!$this->scanned) {
            $this->scanned = true;
            $scanner = new ProgramMiddlewareScanner();
            $scanner->visit($tree);
            $this->sessionMiddlewares = $scanner->getSessionMiddlewares();
            $this->tokenMiddlewares = $scanner->getTokenMiddlewares();
        }

        return parent::visit($tree);
    }

    public function setModelMetadata($metadata)
    {
        $this->modelMetadata = $metadata;
    }

    public function setRouteData($routes)
    {
        $this->routeData = $routes;
    }

    public function getTests()
    {
        return $this->tests;
    }

    public function visitControllerStmt($ctx)
    {
        $controllerName = $ctx->ID()->getText();
        $testMethods = [];
        $importedModels = [];

        $bodies = $ctx->controllerBody();
        if (!is_array($bodies)) {
            $bodies = [$bodies];
        }

        // Guess main model
        $mainModel = str_replace('Controller', '', $controllerName);
        if (!isset($this->modelMetadata[$mainModel])) {
            // Try singularizing/removing s
            if (str_ends_with($mainModel, 's')) {
                $mainModel = substr($mainModel, 0, -1);
            }
        }

        $importedModels[$mainModel] = true;

        foreach ($bodies as $body) {
            $methodCtx = $body->controllerMethod();
            $methodName = $methodCtx->CONTROLLER_METHOD_NAME()->getText();

            // Find route
            $route = null;
            foreach ($this->routeData as $r) {
                if ($r['controller'] === "{$controllerName}@{$methodName}") {
                    $route = $r;
                    break;
                }
            }

            if (!$route) {
                continue;
            }

            $testMethods[] = $this->generateTestMethod($controllerName, $methodName, $route, $mainModel, $methodCtx, $importedModels);
        }

        if (empty($testMethods)) {
            return '';
        }

        $testClass = $controllerName . 'Test';
        $methodsCode = implode("\n\n", $testMethods);

        $imports = "";
        foreach (array_keys($importedModels) as $importModel) {
            if (isset($this->modelMetadata[$importModel])) {
                $imports .= "use App\Models\\$importModel;\n";
            }
        }

        $code = <<<PHP
<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
$imports

class $testClass extends TestCase
{
    use RefreshDatabase;

$methodsCode
}
PHP;
        $this->tests[$testClass] = $code;
        return $code;
    }

    private function guessModelFromForeignKey($key)
    {
        $base = preg_replace('/_id$/i', '', $key);
        $base = preg_replace('/Id$/i', '', $base);
        $modelName = ucfirst($base);

        if (isset($this->modelMetadata[$modelName])) {
            return $modelName;
        }

        foreach (array_keys($this->modelMetadata) as $m) {
            if (strtolower($m) === strtolower($base)) {
                return $m;
            }
        }

        return null;
    }

    private function generateSeedingCodeInline($modelName, $varName, $postData, $seededVars = [])
    {
        $fields = $this->modelMetadata[$modelName] ?? [];
        $code = "        {$varName} = new {$modelName}();\n";

        foreach ($fields as $fieldName => $fieldType) {
            if ($fieldName === 'id') {
                continue;
            }

            if (isset($postData[$fieldName])) {
                $val = is_string($postData[$fieldName]) && !str_starts_with($postData[$fieldName], 'DEPENDENCY_') ? "'{$postData[$fieldName]}'" : $postData[$fieldName];
                if (is_string($val) && str_starts_with($val, 'DEPENDENCY_')) {
                    $dep = substr($val, 11);
                    $val = isset($seededVars[$dep]) ? $seededVars[$dep] . '->id' : '1';
                }
                $code .= "        {$varName}->{$fieldName} = {$val};\n";
                continue;
            }

            if (str_ends_with($fieldName, '_id') || str_ends_with($fieldName, 'Id')) {
                $depModel = $this->guessModelFromForeignKey($fieldName);
                if ($depModel && isset($seededVars[$depModel])) {
                    $code .= "        {$varName}->{$fieldName} = {$seededVars[$depModel]}->id;\n";
                    continue;
                }
                $val = 1;
            } else {
                $val = match ($fieldType) {
                    'integer' => 1,
                    'float', 'double', 'decimal' => 1.5,
                    'boolean' => 1,
                    'date' => '2026-07-15',
                    'datetime', 'timestamp' => '2026-07-15 10:00:00',
                    default => 'Test ' . ucfirst($fieldName),
                };
            }

            $code .= "        {$varName}->{$fieldName} = " . (is_string($val) ? "'$val'" : $val) . ";\n";
        }
        $code .= "        {$varName}->save();\n";
        return $code;
    }

    private function generateTestMethod($controllerName, $methodName, $route, $mainModel, $methodCtx, &$importedModels)
    {
        $httpMethod = strtolower($route['method']);
        $url = $route['url'];

        $testUrl = preg_replace('/\{[a-zA-Z_]+\}/', '1', $url);
        $testName = "test_" . strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', str_replace('Action', '', $methodName)));

        // Scan the block for request properties
        $scanner = new RequestPropertyScanner();
        $scanner->visit($methodCtx->block());
        $reqProperties = $scanner->getProperties();

        // Check if any query models were found
        $modelScanner = new QueryModelScanner();
        $modelScanner->visit($methodCtx->block());
        $queryModels = $modelScanner->getQueryModels();

        // Resolve dependencies recursively (topological sort)
        $modelsToSeed = [];
        $seen = [];
        
        $resolveDeps = function ($modelName) use (&$modelsToSeed, &$seen, &$resolveDeps) {
            if (in_array($modelName, $modelsToSeed)) return;
            if (in_array($modelName, $seen)) return; // Prevent cycles
            $seen[] = $modelName;
            
            $fields = $this->modelMetadata[$modelName] ?? [];
            foreach ($fields as $fieldName => $fieldType) {
                if (str_ends_with($fieldName, '_id') || str_ends_with($fieldName, 'Id')) {
                    $depModel = $this->guessModelFromForeignKey($fieldName);
                    if ($depModel) {
                        $resolveDeps($depModel);
                    }
                }
            }
            $modelsToSeed[] = $modelName;
        };

        // First resolve query models and models derived from request foreign keys
        $initialModels = $queryModels;
        foreach ($reqProperties as $prop) {
            if (str_ends_with($prop, 'Id') || str_ends_with($prop, '_id') || $prop === 'id') {
                $depModel = $this->guessModelFromForeignKey($prop);
                if ($depModel && !in_array($depModel, $initialModels)) {
                    $initialModels[] = $depModel;
                }
            }
        }

        foreach ($initialModels as $m) {
            $resolveDeps($m);
        }

        $seededVars = [];
        $seedCodes = [];

        // Seed all resolved models in order (independent first, dependent last)
        foreach ($modelsToSeed as $m) {
            $varName = '$' . lcfirst($m);
            $seedCodes[] = $this->generateSeedingCodeInline($m, $varName, $reqProperties, $seededVars);
            $seededVars[$m] = $varName;
            $importedModels[$m] = true;
        }

        // Generate payload data
        $postData = [];
        foreach ($reqProperties as $prop) {
            $val = null;

            if (str_ends_with($prop, 'Id') || $prop === 'id') {
                $depModel = $this->guessModelFromForeignKey($prop);
                if ($depModel) {
                    $val = 'DEPENDENCY_' . $depModel;
                } else {
                    $val = 1;
                }

            } elseif (str_ends_with($prop, 'At') || str_contains($prop, 'date') || str_contains($prop, 'time')) {
                $val = '2026-07-15 10:00:00';
            } else {
                $foundType = null;
                foreach ($this->modelMetadata as $m => $fields) {
                    if (isset($fields[$prop])) {
                        $foundType = $fields[$prop];
                        break;
                    }
                }

                $val = match ($foundType) {
                    'integer' => 1,
                    'float', 'double', 'decimal' => 1.5,
                    'boolean' => 1,
                    'date' => '2026-07-15',
                    'datetime', 'timestamp' => '2026-07-15 10:00:00',
                    default => 'Test ' . ucfirst($prop),
                };
            }

            $postData[$prop] = $val;
        }

        $postDataCode = $this->formatPhpArray($postData);
        $queryGlue = str_contains($testUrl, '?') ? '&' : '?';
        $authParam = 'token=123456';
        $testCode = "";

        $seedingString = implode("\n", $seedCodes);
        if (!empty($seedingString)) {
            $seedingString = "\n        // Seed dependencies\n" . $seedingString . "\n";
        }

        $routeMiddlewares = $route['middlewares'] ?? [];
        $usesSession = false;
        $usesToken = false;
        foreach ($routeMiddlewares as $mwName) {
            if (in_array($mwName, $this->sessionMiddlewares)) {
                $usesSession = true;
            }
            if (in_array($mwName, $this->tokenMiddlewares)) {
                $usesToken = true;
            }
        }

        $requestChain = "\$this";
        if ($usesSession) {
            $requestChain .= "->withSession(['user' => 'john_doe', 'user_id' => 1])";
        }

        if (str_contains($methodName, 'list') || str_contains($methodName, 'index') || $httpMethod === 'get') {
            $testCode .= "    public function {$testName}_success(): void\n";
            $testCode .= "    {\n";
            $testCode .= $seedingString;
            $testCode .= "        \$response = {$requestChain}\n";
            $testCode .= "                         ->getJson('{$testUrl}{$queryGlue}{$authParam}');\n\n";
            $testCode .= "        \$response->assertStatus(200);\n";
            $testCode .= "    }";
        } elseif (str_contains($methodName, 'create') || str_contains($methodName, 'store') || $httpMethod === 'post') {
            $testCode .= "    public function {$testName}_success(): void\n";
            $testCode .= "    {\n";
            $testCode .= $seedingString;
            $testCode .= "        \$response = {$requestChain}\n";
            $testCode .= "                         ->postJson('{$testUrl}{$queryGlue}{$authParam}', {$postDataCode});\n\n";
            $testCode .= "        \$response->assertStatus(200);\n";

            if (isset($this->modelMetadata[$mainModel]) && (str_contains($methodName, 'create') || str_contains($methodName, 'store'))) {
                $tableName = strtolower($this->pluralize($mainModel));
                $testCode .= "        \$this->assertDatabaseHas('{$tableName}', [\n";
                foreach ($postData as $key => $val) {
                    if (is_string($val) && str_starts_with($val, 'DEPENDENCY_')) {
                        continue;
                    }
                    $formattedVal = is_string($val) ? "'$val'" : $val;
                    $testCode .= "            '{$key}' => {$formattedVal},\n";
                    break;
                }
                $testCode .= "        ]);\n";
            }
            $testCode .= "    }";
        } else {
            $testCode .= "    public function {$testName}_success(): void\n";
            $testCode .= "    {\n";
            $testCode .= $seedingString;
            $testCode .= "        \$response = {$requestChain}\n";
            $testCode .= "                         ->call('{$httpMethod}', '{$testUrl}{$queryGlue}{$authParam}', {$postDataCode});\n\n";
            $testCode .= "        \$response->assertStatus(200);\n";
            $testCode .= "    }";
        }

        // Add security test cases for token or session auth failure
        if ($usesToken) {
            $unauthTestName = "{$testName}_without_token";
            $testCode .= "\n\n    public function {$unauthTestName}(): void\n";
            $testCode .= "    {\n";
            $httpMethodUpper = strtoupper($httpMethod);
            if ($httpMethod === 'get') {
                $testCode .= "        \$response = \$this->getJson('{$testUrl}');\n";
            } else {
                $testCode .= "        \$response = \$this->json('{$httpMethodUpper}', '{$testUrl}', []);\n";
            }
            $testCode .= "        \$response->assertJson(['error' => 'Token invalid']);\n";
            $testCode .= "    }";
        }

        if ($usesSession) {
            $unauthTestName = "{$testName}_without_session";
            $testCode .= "\n\n    public function {$unauthTestName}(): void\n";
            $testCode .= "    {\n";
            $urlWithAuth = $usesToken ? "{$testUrl}{$queryGlue}{$authParam}" : $testUrl;
            $httpMethodUpper = strtoupper($httpMethod);
            if ($httpMethod === 'get') {
                $testCode .= "        \$response = \$this->getJson('{$urlWithAuth}');\n";
            } else {
                $testCode .= "        \$response = \$this->json('{$httpMethodUpper}', '{$urlWithAuth}', []);\n";
            }
            $testCode .= "        \$response->assertRedirect('/login');\n";
            $testCode .= "    }";
        }

        return $testCode;
    }

    private function formatPhpArray($arr)
    {
        if (empty($arr)) {
            return '[]';
        }
        $parts = [];
        foreach ($arr as $k => $v) {
            if (is_string($v) && str_starts_with($v, 'DEPENDENCY_')) {
                $dep = substr($v, 11);
                $val = '$' . lcfirst($dep) . '->id';
            } else {
                $val = is_string($v) ? "'$v'" : $v;
            }
            $parts[] = "'$k' => $val";
        }
        return '[' . implode(', ', $parts) . ']';
    }
}
