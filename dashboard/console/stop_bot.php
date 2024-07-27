<?php
session_start();
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['login'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
    exit;
}

$pidFile = '../logs/pid.txt';
if (!file_exists($pidFile)) {
    echo json_encode(['status' => 'error', 'message' => 'PID file not found']);
    exit;
}

$pid = file_get_contents($pidFile);
if (!$pid) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to read PID']);
    exit;
}

$command = 'kill ' . intval($pid);
$output = shell_exec($command);

$checkCommand = 'ps -p ' . intval($pid);
$checkOutput = shell_exec($checkCommand);

if ($checkOutput === null || strpos($checkOutput, strval($pid)) === false) {
    unlink($pidFile);
    echo json_encode(['status' => 'success', 'message' => 'Bot stopped']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to stop bot']);
}
?>
