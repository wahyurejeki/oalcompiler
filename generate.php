<?php
// Set Composer environment variables for web hosting and shared servers
$composerHome = __DIR__ . '/.composer';
if (!is_dir($composerHome)) {
    @mkdir($composerHome, 0755, true);
}
putenv('COMPOSER_HOME=' . $composerHome);
putenv('HOME=' . $composerHome);

require_once __DIR__ . '/vendor/autoload.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Wahyurejeki\Oalcompiler\Laravel\LaravelModelCompiler;
use Wahyurejeki\Oalcompiler\Laravel\LaravelControllerCompiler;
use Wahyurejeki\Oalcompiler\Laravel\LaravelMiddlewareCompiler;
use Wahyurejeki\Oalcompiler\Laravel\LaravelRouteCompiler;
use Wahyurejeki\Oalcompiler\Laravel\LaravelTestCompiler;
use Wahyurejeki\Oalcompiler\Express\ExpressControllerCompiler;
use Antlr\Antlr4\Runtime\InputStream;

$inputFile = 'examples/library.oal';
$framework = 'laravel';
$skipFormat = false;

foreach ($argv as $arg) {
    if (str_ends_with($arg, '.oal')) {
        $inputFile = $arg;
    } elseif (strpos($arg, 'framework=') === 0) {
        $framework = explode('=', $arg)[1];
    } elseif ($arg === '--no-format') {
        $skipFormat = true;
    }
}

$lexer = new OALLexer(InputStream::fromPath($inputFile));
$tokens = new CommonTokenStream($lexer);
$parser = new OALParser($tokens);

$tree = $parser->program();

// Helper functions
function clearDirectory($dir) {
    if (!is_dir($dir)) return;
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        $path = "$dir/$file";
        if (is_dir($path)) {
            clearDirectory($path);
            @rmdir($path);
        } else {
            @unlink($path);
        }
    }
}

function pluralize($word) {
    $word = trim($word);
    if (str_ends_with(strtolower($word), 'y')) return substr($word, 0, -1) . 'ies';
    if (str_ends_with(strtolower($word), 's')) return $word;
    return $word . 's';
}

if ($framework === 'express') {
    echo "Compiling for Express (Node.js)...\n";
    
    $dirPathOutput = __DIR__.'/template_express';
    $dirPathModels = $dirPathOutput . "/models";
    $dirPathControllers = $dirPathOutput . "/controllers";
    $dirPathRoutes = $dirPathOutput . "/routes";
    $dirPathConfig = $dirPathOutput . "/config";

    echo "Cleaning up output directories...\n";
    clearDirectory($dirPathModels);
    clearDirectory($dirPathControllers);
    clearDirectory($dirPathRoutes);
    clearDirectory($dirPathConfig);

    $model = new \Wahyurejeki\Oalcompiler\Express\ExpressModelCompiler();
    $model->visit($tree);

    $controller = new ExpressControllerCompiler();
    $controller->visit($tree);

    $route = new \Wahyurejeki\Oalcompiler\Express\ExpressRouteCompiler();
    $route->visit($tree);
    
    if (!is_dir($dirPathModels)) mkdir($dirPathModels, 0755, true);
    if (!is_dir($dirPathControllers)) mkdir($dirPathControllers, 0755, true);
    if (!is_dir($dirPathRoutes)) mkdir($dirPathRoutes, 0755, true);
    if (!is_dir($dirPathConfig)) mkdir($dirPathConfig, 0755, true);

    file_put_contents($dirPathConfig . "/database.js", $model->getDatabaseConfig());

    foreach ($model->getModels() as $name => $code) {
        file_put_contents($dirPathModels . "/$name.js", $code);
    }

    foreach ($controller->getControllers() as $name => $code) {
        $filePath = $dirPathControllers . "/$name.js";
        file_put_contents($filePath, $code);
        echo "Created: $filePath\n";
    }

    file_put_contents($dirPathRoutes . "/index.js", $route->getRoutesCode());

    $appJs = <<<JS
require('dotenv').config();
const express = require('express');
const sequelize = require('./config/database');
const routes = require('./routes');

const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.json());
app.use('/', routes);

sequelize.sync().then(() => {
    console.log('Database connected & synced');
    app.listen(PORT, () => {
        console.log(`Server is running on http://localhost:\${PORT}`);
    });
}).catch(err => {
    console.error('Unable to connect to the database:', err);
});
JS;
    file_put_contents($dirPathOutput . "/app.js", $appJs);

    $prettierIgnore = <<<TEXT
node_modules
package-lock.json
.env
TEXT;
    file_put_contents($dirPathOutput . "/.prettierignore", $prettierIgnore);

    $requirements = array_unique(array_merge($controller->getRequirements(), ['express', 'sequelize', 'mysql2', 'dotenv', 'prettier']));
    if (!empty($requirements)) {
        if (!file_exists($dirPathOutput . '/package.json')) {
            $initialPackage = [
                'name' => 'oal-express-app',
                'version' => '1.0.0',
                'main' => 'app.js',
                'scripts' => [
                    'start' => 'node app.js',
                    'format' => 'prettier --write .'
                ],
                'dependencies' => [
                    'express' => '^4.18.2'
                ]
            ];
            file_put_contents($dirPathOutput . '/package.json', json_encode($initialPackage, JSON_PRETTY_PRINT));
        }
        
        $packages = implode(' ', $requirements);
        echo "Installing NPM packages: $packages...\n";
        exec("npm install $packages --prefix $dirPathOutput");
    }

    if (!$skipFormat) {
        echo "Formatting code with Prettier...\n";
        @exec("cd $dirPathOutput && npx prettier --write . --ignore-path .prettierignore");
    } else {
        echo "Skipping code formatting...\n";
    }

    echo "Generated Express.js code successfully\n";
    exit;
}

// ================= LARAVEL TRANSPILE =================
$dirPathOutput = __DIR__.'/template';
$dirPathModels = $dirPathOutput . "/app/Models";
$dirPathMigrations = $dirPathOutput . "/database/migrations";
$dirPathControllers = $dirPathOutput . "/app/Http/Controllers";
$dirPathMiddleware = $dirPathOutput . "/app/Http/Middleware";
$dirPathRoute = $dirPathOutput . "/routes";
$dirPathViews = $dirPathOutput . "/resources/views";
$dirPathTests = $dirPathOutput . "/tests/Feature";

echo "Cleaning up output directories...\n";
clearDirectory($dirPathModels);
clearDirectory($dirPathMigrations);
clearDirectory($dirPathControllers);
clearDirectory($dirPathMiddleware);
clearDirectory($dirPathViews);
clearDirectory($dirPathTests);

if (!is_dir($dirPathViews . "/layouts")) {
    mkdir($dirPathViews . "/layouts", 0755, true);
}

$adminLayout = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OAL Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        .select2-container .select2-selection--single { height: 38px !important; border: 1px solid #d1d3e2 !important; }
        .select2-container--default .select2-selection--single .select2-selection__rendered { line-height: 38px !important; }
        .select2-container--default .select2-selection--single .select2-selection__arrow { height: 36px !important; }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                <div class="sidebar-brand-text mx-3">OAL Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active"><a class="nav-link" href="/"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Modules</div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#"><span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span></a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">@yield('content')</div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto"><div class="copyright text-center my-auto"><span>Copyright &copy; OAL Compiler 2024</span></div></div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>
</body>
</html>
HTML;
file_put_contents($dirPathViews . "/layouts/admin.blade.php", $adminLayout);

$model = new LaravelModelCompiler();
$model->visit($tree);

$controller = new LaravelControllerCompiler();
$controller->setModelMetadata($model->getModelMetadata());
$controller->visit($tree);

$middleware = new LaravelMiddlewareCompiler();
$middleware->visit($tree);

$route = new LaravelRouteCompiler();
$route->visit($tree);

$testCompiler = new LaravelTestCompiler();
$testCompiler->setModelMetadata($model->getModelMetadata());
$testCompiler->setRouteData($route->getRouteData());
$testCompiler->visit($tree);

$allModels = array_keys($model->getModelMetadata());

foreach ($model->getModels() as $name => $code) {
    if (!is_dir($dirPathModels)) mkdir($dirPathModels, 0755, true);
    file_put_contents($dirPathModels . "/$name.php", $code);
}

foreach ($model->getMigrations() as $filename => $content) {
    if (!is_dir($dirPathMigrations)) mkdir($dirPathMigrations, 0755, true);
    file_put_contents($dirPathMigrations . "/$filename", $content);
}

if (!is_dir($dirPathControllers)) mkdir($dirPathControllers, 0755, true);
$baseControllerCode = "<?php\n\nnamespace App\Http\Controllers;\n\nabstract class Controller {}\n";
file_put_contents($dirPathControllers . "/Controller.php", $baseControllerCode);

foreach ($controller->getControllers() as $name => $code) {
    file_put_contents($dirPathControllers . "/$name.php", $code);
}

foreach ($middleware->getMiddlewares() as $name => $code) {
    if (!is_dir($dirPathMiddleware)) mkdir($dirPathMiddleware, 0755, true);
    file_put_contents($dirPathMiddleware . "/$name.php", $code);
}

$dirPathRouteName = $dirPathRoute . '/web.php';
file_put_contents($dirPathRouteName, $route->getRoutes());

// Generate dynamic DatabaseSeeder.php
$seederDir = $dirPathOutput . "/database/seeders";
if (!is_dir($seederDir)) {
    mkdir($seederDir, 0755, true);
}
file_put_contents($seederDir . "/DatabaseSeeder.php", generateDatabaseSeeder($model->getModelMetadata()));

foreach ($testCompiler->getTests() as $name => $code) {
    if (!is_dir($dirPathTests)) mkdir($dirPathTests, 0755, true);
    file_put_contents($dirPathTests . "/$name.php", $code);
}

$sidebarLinks = "";
foreach ($route->getRouteData() as $r) {
    if (strtolower($r['method']) === 'get') {
        $name = ucfirst(trim($r['url'], '/'));
        if (empty($name)) $name = "Dashboard";
        $sidebarLinks .= '<li class="nav-item"><a class="nav-link" href="' . $r['url'] . '"><i class="fas fa-fw fa-link"></i><span>' . $name . '</span></a></li>' . "\n";
    }
}

$layoutContent = file_get_contents($dirPathViews . "/layouts/admin.blade.php");
$newLayout = str_replace('<div class="sidebar-heading">Modules</div>', '<div class="sidebar-heading">Modules</div>' . "\n" . $sidebarLinks, $layoutContent);
file_put_contents($dirPathViews . "/layouts/admin.blade.php", $newLayout);

$requirements = $controller->getRequirements();
if (!empty($requirements)) {
    $composerData = json_decode(file_get_contents($dirPathOutput . '/composer.json'), true);
    $existing = array_merge(array_keys($composerData['require'] ?? []), array_keys($composerData['require-dev'] ?? []));
    foreach ($requirements as $package) {
        if (!in_array($package, $existing)) {
            echo "Installing package: $package...\n";
            exec("composer require $package --working-dir=$dirPathOutput --no-interaction");
        }
    }
}

if (!$skipFormat) {
    echo "Formatting generated Laravel code...\n";
    @exec("composer format $dirPathOutput");
} else {
    echo "Skipping code formatting...\n";
}
echo "Generated Laravel PHP code successfully\n";

function generateDatabaseSeeder($modelMetadata) {
    // 1. Separate models into Independent (A) and Dependent (B)
    $independent = [];
    $dependent = [];

    foreach ($modelMetadata as $modelName => $fields) {
        $hasForeignKey = false;
        foreach (array_keys($fields) as $field) {
            if ($field !== 'id' && str_ends_with(strtolower($field), '_id')) {
                $hasForeignKey = true;
                break;
            }
        }
        if ($hasForeignKey) {
            $dependent[$modelName] = $fields;
        } else {
            $independent[$modelName] = $fields;
        }
    }

    $seederLines = [];
    $seederLines[] = "<?php\n";
    $seederLines[] = "namespace Database\Seeders;\n";
    $seederLines[] = "use Illuminate\Database\Seeder;";
    
    // Import all models
    foreach (array_keys($modelMetadata) as $modelName) {
        $seederLines[] = "use App\Models\\$modelName;";
    }
    
    $seederLines[] = "\nclass DatabaseSeeder extends Seeder\n{";
    $seederLines[] = "    public function run(): void\n    {";

    // Helper to generate seed code for a model
    $writeSeedCode = function($modelName, $fields) {
        $code = [];
        $code[] = "        // Seed $modelName";
        $code[] = "        for (\$i = 1; \$i <= 10; \$i++) {";
        
        // Resolve foreign keys
        $fkResolutions = [];
        $dataAssignments = [];
        
        foreach ($fields as $fieldName => $fieldType) {
            if ($fieldName === 'id') continue; // auto-increment
            
            // Check if foreign key
            if (str_ends_with(strtolower($fieldName), '_id')) {
                // Infer related model name (e.g. Category_id -> Category)
                $relatedModel = substr($fieldName, 0, -3); // remove _id
                // capitalize correctly to match model name (e.g. category -> Category)
                $relatedModelClass = ucfirst($relatedModel);
                
                $varName = lcfirst($relatedModelClass);
                $fkResolutions[] = "            \$" . $varName . " = \\App\\Models\\$relatedModelClass::query()->inRandomOrder()->first();";
                $dataAssignments[] = "                '$fieldName' => \$" . $varName . " ? \$" . $varName . "->id : null,";
            } else {
                // Semantic dictionaries for realistic and context-aware seeding (e.g. Library Theme)
                $lowerModel = strtolower($modelName);
                $lowerField = strtolower($fieldName);
                $valStr = "";

                if ($lowerModel === 'category' && $lowerField === 'name') {
                    $valStr = "[\"Novel & Fiksi\", \"Komputer & Pemrograman\", \"Sains & Teknologi\", \"Sejarah & Budaya\", \"Filsafat & Agama\", \"Biografi & Otobiografi\", \"Sastra & Bahasa\", \"Komik & Manga\"][(\$i - 1) % 8]";
                } elseif ($lowerModel === 'publisher' && $lowerField === 'name') {
                    $valStr = "[\"Gramedia Pustaka Utama\", \"Elex Media Komputindo\", \"Mizan Publishing\", \"Penerbit Andi\", \"Bentang Pustaka\", \"Republika Penerbit\"][(\$i - 1) % 6]";
                } elseif ($lowerModel === 'author' && $lowerField === 'name') {
                    $valStr = "[\"Andrea Hirata\", \"Tere Liye\", \"Pramoedya Ananta Toer\", \"Dee Lestari\", \"Eka Kurniawan\", \"Habiburrahman El Shirazy\", \"Sapardi Djoko Damono\"][(\$i - 1) % 7]";
                } elseif ($lowerModel === 'book' && $lowerField === 'title') {
                    $valStr = "[\"Laskar Pelangi\", \"Bumi Manusia\", \"Perahu Kertas\", \"Cantik itu Luka\", \"Negeri 5 Menara\", \"Belajar Laravel 11\", \"Dasar-Dasar Database MySQL\", \"Clean Code dan Arsitektur Clean\", \"Kosmos\", \"Sejarah Singkat Waktu\"][(\$i - 1) % 10]";
                } elseif (($lowerModel === 'member' || $lowerModel === 'user' || $lowerModel === 'customer') && $lowerField === 'name') {
                    $valStr = "[\"Ahmad Fauzi\", \"Siti Aminah\", \"Budi Santoso\", \"Dewi Lestari\", \"Rian Hidayat\", \"Indah Permata\", \"Rizky Pratama\", \"Santi Wijaya\", \"Eko Prasetyo\", \"Mega Utami\"][(\$i - 1) % 10]";
                } elseif ($lowerField === 'email' && ($lowerModel === 'member' || $lowerModel === 'user' || $lowerModel === 'customer')) {
                    $valStr = "[\"ahmad.fauzi\", \"siti.aminah\", \"budi.santoso\", \"dewi.lestari\", \"rian.hidayat\", \"indah.permata\", \"rizky.pratama\", \"santi.wijaya\", \"eko.prasetyo\", \"mega.utami\"][(\$i - 1) % 10] . \$i . '@example.com'";
                } else {
                    // Fallback to standard type-based generation
                    switch (strtolower($fieldType)) {
                        case 'boolean':
                            $valStr = "rand(0, 1) == 1";
                            break;
                        case 'integer':
                        case 'biginteger':
                            if (stripos($fieldName, 'year') !== false) {
                                $valStr = "rand(2000, 2026)";
                            } else {
                                $valStr = "rand(1, 100)";
                            }
                            break;
                        case 'decimal':
                        case 'float':
                        case 'double':
                            $valStr = "rand(10, 1000) . '.50'";
                            break;
                        case 'date':
                            $valStr = "now()->subDays(rand(1, 365))->format('Y-m-d')";
                            break;
                        case 'datetime':
                        case 'timestamp':
                            $valStr = "now()->subDays(rand(1, 365))->subHours(rand(1, 24))";
                            break;
                        case 'text':
                            $valStr = "'Lorem ipsum dolor sit amet text description for ' . '$fieldName' . ' demo ' . \$i";
                            break;
                        default: // string
                            if (strtolower($fieldName) === 'name') {
                                $valStr = "'Demo Name ' . \$i";
                            } elseif (strtolower($fieldName) === 'email') {
                                $valStr = "'email.' . \$i . '@example.com'";
                            } elseif (strtolower($fieldName) === 'phone') {
                                $valStr = "'08' . rand(100000000, 999999999)";
                            } else {
                                $valStr = "'Demo ' . '$fieldName' . ' ' . \$i";
                            }
                            break;
                    }
                }
                $dataAssignments[] = "                '$fieldName' => $valStr,";
            }
        }

        $fkResolutions = array_unique($fkResolutions);
        foreach ($fkResolutions as $line) {
            $code[] = $line;
        }

        $code[] = "            $modelName::create([";
        foreach ($dataAssignments as $line) {
            $code[] = $line;
        }
        $code[] = "            ]);";
        $code[] = "        }\n";
        
        return implode("\n", $code);
    };

    // Seed independent models first
    foreach ($independent as $modelName => $fields) {
        $seederLines[] = $writeSeedCode($modelName, $fields);
    }

    // Seed dependent models next
    foreach ($dependent as $modelName => $fields) {
        $seederLines[] = $writeSeedCode($modelName, $fields);
    }

    $seederLines[] = "    }";
    $seederLines[] = "}";

    return implode("\n", $seederLines);
}
