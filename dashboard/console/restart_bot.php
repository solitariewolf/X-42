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
}

$command = 'node ../main.js > ../logs/bot.log 2>&1 & echo $!';
$pid = shell_exec($command);
file_put_contents('../logs/pid.txt', $pid);
echo json_encode(['status' => 'Bot restarted', 'pid' => $pid]);
?>
