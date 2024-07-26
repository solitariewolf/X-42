<?php
session_start();
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
if (!isset($_SESSION['login'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
    exit;
}

// Verifique se o diretório de logs existe, se não, crie-o
$logDir = '../logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
}

$command = 'node ../main.js > ../logs/bot.log 2>&1 & echo $!';
$pid = shell_exec($command);
if ($pid) {
    file_put_contents('../logs/pid.txt', $pid);
    echo json_encode(['status' => 'success', 'message' => 'Bot started', 'pid' => $pid]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to start bot']);
}
?>
