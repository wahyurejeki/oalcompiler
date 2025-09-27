<?php
require_once __DIR__ . '/vendor/autoload.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Wahyurejeki\Oalcompiler\CompilerModel;
use Wahyurejeki\Oalcompiler\CompilerController;
use Wahyurejeki\Oalcompiler\CompilerMiddleware;
use Wahyurejeki\Oalcompiler\CompilerRoute;
use Antlr\Antlr4\Runtime\InputStream;

$inputFile = $argv[1] ?? 'examples/library.oal';
$lexer = new OALLexer(InputStream::fromPath($inputFile));
$tokens = new CommonTokenStream($lexer);
$parser = new OALParser($tokens);

$tree = $parser->program();

$model = new CompilerModel();
$model->visit($tree);

$controller = new CompilerController();
$controller->visit($tree);

$middleware = new CompilerMiddleware();
$middleware->visit($tree);

$route = new CompilerRoute();
$route->visit($tree);

$dirPathOutput = __DIR__.'/output';
$dirPathModels = __DIR__ . "/output/app/Models";
$dirPathMigrations = __DIR__ . "/output/database/migrations";
$dirPathControllers = __DIR__ . "/output/app/Http/Controllers";
$dirPathMiddleware = __DIR__ . "/output/app/Http/Middleware";
$dirPathRoute = __DIR__ . "/output/routes";

if (is_dir($dirPathMigrations)) {
    //delete all migration   file
    foreach (glob($dirPathMigrations . '/*.php') as $file) {
        @unlink($file);
    }

}

//================= Write Models =================
foreach ($model->getModels() as $name => $code) {
    if (!is_dir($dirPathModels)) {
        mkdir($dirPathModels, 0755, true);
    }

    $dirPathModelName = $dirPathModels . "/$name.php";
    file_put_contents($dirPathModelName, $code);
}

// ================= Write Migrations =================
foreach ($model->getMigrations() as $filename => $content) {
    if (!is_dir($dirPathMigrations)) {
        mkdir($dirPathMigrations, 0755, true);
    }

    $dirPathMigrationName = $dirPathMigrations . "/$filename";
    file_put_contents($dirPathMigrationName, $content);
}

// ================= Controllers =================
foreach ($controller->getControllers() as $name => $code) {
    if (!is_dir($dirPathControllers)) {
        mkdir($dirPathControllers, 0755, true);
    }

    $dirPathControllerName = $dirPathControllers . "/$name.php";
    file_put_contents($dirPathControllerName, $code);
}

// ================= Middleware =================
foreach ($middleware->getMiddlewares() as $name => $code) {
    if (!is_dir($dirPathMiddleware)) {
        mkdir($dirPathMiddleware, 0755, true);
    }

    $dirPathMiddlewareName = $dirPathMiddleware . "/$name.php";
    file_put_contents($dirPathMiddlewareName, $code);
}

if (!is_dir($dirPathRoute)) {
    mkdir($dirPathRoute, 0755, true);
}
$dirPathRouteName = $dirPathRoute . '/web.php';

// ================= Routes =================
file_put_contents($dirPathRouteName, $route->getRoutes());

echo "Prettier code $dirPathOutput \n";
exec("composer format $dirPathOutput");

echo "Generated Laravel PHP code to output directory \n";
