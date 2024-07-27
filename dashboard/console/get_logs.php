<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['login'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not authenticated']);
    exit;
}

$logFile = '../logs/bot.log';

if (file_exists($logFile)) {
    $logs = array_slice(file($logFile), -35);
    echo json_encode(['status' => 'success', 'logs' => $logs]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Log file not found']);
}
?>
