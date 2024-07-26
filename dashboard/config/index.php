<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/config.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>X-42 Discord Music Bot</title>
</head>
<body>
    <div class="container">
        <h1>Configuração do Bot</h1>
        <form id="config-form">
            <label for="token">Token:</label>
            <input type="text" id="token" name="token" required>
            
            <label for="app-id">APPLICATION ID:</label>
            <input type="text" id="app-id" name="appId" required>
            
            <label for="client-secret">Client Secret:</label>
            <input type="text" id="client-secret" name="clientSecret" required>
            
            <button type="submit">Salvar</button>
        </form>
    </div>
    <script src="../js/config.js"></script>
</body>
</html>
