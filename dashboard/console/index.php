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
            </div>
        </a>

        <div class="console-container">
            <h1>Console do Bot</h1>
            <textarea id="console-output" readonly></textarea>
            <div class="console-input">
                <input type="text" id="console-command" placeholder="Digite o comando aqui...">
                <button id="send-command-btn">Enviar</button>
            </div>
            <div class="actions">
                <button id="start-btn"><i class="fas fa-play"></i> Iniciar</button>
                <button id="restart-btn"><i class="fas fa-sync"></i> Reiniciar</button>
                <button id="stop-btn"><i class="fas fa-stop"></i> Parar</button>
                <button id="force-stop-btn"><i class="fas fa-times-circle"></i> Forçar Parada</button>
            </div>
        </div>

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
