<?php
// Inclua o arquivo de configuração do banco de dados
require 'config.php';

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Prepare a consulta SQL
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE login = :login');
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $user = $stmt->fetch();

    // Verifique se o usuário existe e a senha está correta
    if ($user && password_verify($senha, $user['senha'])) {
        // Inicie a sessão
        session_start();
        $_SESSION['login'] = $user['login'];
        
        // Retorne 'success'
        echo 'success';
    } else {
        // Retorne 'error'
        echo 'error';
    }
}
?>
