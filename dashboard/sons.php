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
    <link rel="stylesheet" href="../styles/sons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>X-42 Discord Music Bot</title>
</head>
<body>
  
<div class="container">
<div class="logo">
    <img src="../img/logo.png" alt="">
</div>
    <a href="index.php">
        <div class="home-icon">
            <i class="fas fa-home"></i>
            <p>Home</p>
        </div>
    </a>

    <header>
        <h1>Gerenciador de Arquivos MP3</h1>
    </header>

    <section class="upload-section">
        <h2>Upload de Arquivos</h2>
        <label for="folder-select">Selecione a pasta:</label>
        <select id="folder-select">
            <!-- Opções de pastas serão carregadas dinamicamente aqui -->
        </select>
        <input type="file" id="file-upload" accept=".mp3">
        <button id="upload-btn">Upload</button>
    </section>

    <section class="folder-section">
        <h2>Pastas</h2>
        <div class="folder-actions">
            <form action="create_folder.php" method="post" id="create-folder-form">
                <input type="text" name="folder_name" placeholder="Nome da pasta" required>
                <button type="submit">Criar Pasta</button>
            </form>
            <input type="text" id="new-folder-name" placeholder="Novo nome da pasta">
            <button id="rename-folder-btn">Renomear Pasta</button>
            <button id="delete-folder-btn">Excluir Pasta</button>
        </div>
        <div class="folders" id="folder-list">
            <!-- Pastas criadas dinamicamente serão inseridas aqui -->
        </div>
    </section>

    <section class="file-section">
            <h2>Arquivos</h2>
            <div class="file-actions">
                <input type="text" id="new-file-name" placeholder="Novo nome do arquivo">
                <button id="rename-file-btn">Renomear Arquivo</button>
                <button id="delete-file-btn">Excluir Arquivo</button>
            </div>
            <div class="files" id="file-list">
                <!-- Arquivos dentro da pasta serão inseridos aqui -->
            </div>
        </section>
</div>

    <script src="../js/sons.js"></script>
</body>
</html>