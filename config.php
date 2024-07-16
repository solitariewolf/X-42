<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    die('Acesso direto não permitido');
}
$host = 'localhost'; // Host do seu banco de dados
$db   = 'x42db'; // Nome do seu banco de dados
$user = 'root'; // Usuário do banco de dados
$pass = ''; // Senha do usuário do banco de dados
$charset = 'utf8mb4'; // Charset do seu banco de dados

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
