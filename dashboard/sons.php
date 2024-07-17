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
    <title>X-42 Discord Music Bot</title>
</head>
<body>
  
<div class="container">
    <header>
        <h1>Gerenciador de Arquivos MP3</h1>
    </header>

    <section class="upload-section">
        <h2>Upload de Arquivos</h2>
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
            <button id="rename-folder-btn">Renomear Pasta</button>
            <button id="delete-folder-btn">Excluir Pasta</button>
        </div>
        <div class="folders">
            <!-- Pastas criadas dinamicamente serão inseridas aqui -->
        </div>
    </section>
</div>

    <script src="../js/sons.js"></script>
</body>
</html>