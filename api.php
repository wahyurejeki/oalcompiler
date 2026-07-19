<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$diagramFile = __DIR__ . '/diagram.json';
$oalFile = __DIR__ . '/examples/generated.oal';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'load':
        if (file_exists($diagramFile)) {
            $data = file_get_contents($diagramFile);
            echo $data;
        } else {
            echo json_encode([
                'models' => [],
                'routes' => [],
                'middlewares' => []
            ]);
        }
        break;

    case 'save':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid JSON input']);
            exit;
        }

        // Save diagram state
        file_put_contents($diagramFile, json_encode($input, JSON_PRETTY_PRINT));

        // Save generated OAL text
        $oalCode = $input['oal_code'] ?? '';
        if ($oalCode) {
            // Ensure examples directory exists
            $examplesDir = __DIR__ . '/examples';
            if (!is_dir($examplesDir)) {
                mkdir($examplesDir, 0755, true);
            }
            file_put_contents($oalFile, $oalCode);
        }

        echo json_encode(['success' => true, 'message' => 'Diagram saved successfully']);
        break;

    case 'compile':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid JSON input']);
            exit;
        }

        // 1. Save state and OAL first
        file_put_contents($diagramFile, json_encode($input, JSON_PRETTY_PRINT));
        $oalCode = $input['oal_code'] ?? '';
        if ($oalCode) {
            $examplesDir = __DIR__ . '/examples';
            if (!is_dir($examplesDir)) {
                mkdir($examplesDir, 0755, true);
            }
            file_put_contents($oalFile, $oalCode);
        } else {
            echo json_encode(['success' => false, 'output' => 'Error: OAL code is empty']);
            exit;
        }

        // 2. Change directory to project root and run compiler
        $projectRoot = __DIR__;
        $compilerScript = $projectRoot . '/generate.php';
        $relativeOalPath = 'examples/generated.oal';

        if (!file_exists($compilerScript)) {
            echo json_encode(['success' => false, 'output' => "Compiler generate.php not found at $compilerScript"]);
            exit;
        }

        // Execute compiler and capture stdout and stderr
        $currentDir = getcwd();
        chdir($projectRoot);
        
        $command = "php generate.php " . escapeshellarg($relativeOalPath) . " 2>&1";
        $output = [];
        $returnVar = 0;
        exec($command, $output, $returnVar);
        
        chdir($currentDir); // Restore directory

        $outputStr = implode("\n", $output);
        $success = ($returnVar === 0);

        echo json_encode([
            'success' => $success,
            'code' => $returnVar,
            'output' => $outputStr
        ]);
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Action not found']);
        break;
}
