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
    <link rel="stylesheet" href="../../styles/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>X-42 Discord Music Bot</title>
</head>
<body>
    <div class="container">

    <div class="logo">
        <img src="../../img/logo.png" alt="">
    </div>
        <a href="../index.php">
            <div class="home-icon">
            <i class="fas fa-home"></i>
            <p>Home</p>
        </a>
        </div>

        <header>
            <h1>Console de Gerenciamento</h1>
        </header>

        <section class="terminal-section">
            <div class="terminal-output" id="terminal-output"></div>
            <div class="terminal-input">
                <input type="text" id="terminal-input" placeholder="Digite um comando...">
                <button id="send-command-btn"><i class="fas fa-paper-plane"></i> Enviar</button>
            </div>
        </section>

        <section class="controls">
            <button id="start-btn"><i class="fas fa-play"></i> Iniciar</button>
            <button id="restart-btn"><i class="fas fa-sync-alt"></i> Reiniciar</button>
            <button id="stop-btn"><i class="fas fa-stop"></i> Parar</button>
            <button id="force-stop-btn"><i class="fas fa-ban"></i> Forçar Parada</button>
            <button id="stats-btn"><i class="fas fa-chart-line"></i> Estatísticas</button>
        </section>

        <section class="charts">
            <div class="chart-container">
                <h2>Uso de RAM</h2>
                <canvas id="ram-chart"></canvas>
            </div>
            <div class="chart-container">
                <h2>Uso de CPU</h2>
                <canvas id="cpu-chart"></canvas>
            </div>
        </section>
    </div>

    <script src="../../js/console.js"></script>
</body>
</html>
