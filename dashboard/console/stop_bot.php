<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../');
    exit;
}

$pid = file_get_contents('../logs/pid.txt');
if ($pid) {
    shell_exec("kill $pid");
    unlink('../logs/pid.txt');
    echo json_encode(['status' => 'Bot stopped']);
} else {
    echo json_encode(['status' => 'No running bot found']);
}
?>
