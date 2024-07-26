document.addEventListener('DOMContentLoaded', function() {
    const ramCtx = document.getElementById('ram-chart').getContext('2d');
    const cpuCtx = document.getElementById('cpu-chart').getContext('2d');
    const terminalOutput = document.getElementById('terminal-output');
    const terminalInput = document.getElementById('terminal-input');
    const sendCommandBtn = document.getElementById('send-command-btn');

    const ramChart = new Chart(ramCtx, {
        type: 'line',
        data: {
            labels: [], // Labels will be added dynamically
            datasets: [{
                label: 'Uso de RAM',
                data: [],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tempo'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Uso de RAM (MB)'
                    }
                }
            }
        }
    });

    const cpuChart = new Chart(cpuCtx, {
        type: 'line',
        data: {
            labels: [], // Labels will be added dynamically
            datasets: [{
                label: 'Uso de CPU',
                data: [],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tempo'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Uso de CPU (%)'
                    }
                }
            }
        }
    });

    document.getElementById('start-btn').addEventListener('click', () => {
        fetch('../console/start_bot.php', { method: 'POST' })
            .then(response => response.json())
            .then(data => updateConsole(data.status));
    });
    
    document.getElementById('stop-btn').addEventListener('click', () => {
        fetch('../console/stop_bot.php', { method: 'POST' })
            .then(response => response.json())
            .then(data => updateConsole(data.status));
    });
    
    document.getElementById('restart-btn').addEventListener('click', () => {
        fetch('../console/restart_bot.php', { method: 'POST' })
            .then(response => response.json())
            .then(data => updateConsole(data.status));
    });
    
    document.getElementById('force-stop-btn').addEventListener('click', () => {
        fetch('../console/force_stop_bot.php', { method: 'POST' })
            .then(response => response.json())
            .then(data => updateConsole(data.status));
    });
    
    function updateConsole(message) {
        const consoleOutput = document.getElementById('console-output');
        consoleOutput.value += message + '\n';
        consoleOutput.scrollTop = consoleOutput.scrollHeight;
    }
    

    function updateCharts(ramChart, cpuChart) {
        // Simulação de dados, substitua isso com dados reais
        const currentTime = new Date().toLocaleTimeString();
        const ramUsage = Math.random() * 1000;
        const cpuUsage = Math.random() * 100;

        if (ramChart.data.labels.length >= 20) {
            ramChart.data.labels.shift();
            ramChart.data.datasets[0].data.shift();
        }

        if (cpuChart.data.labels.length >= 20) {
            cpuChart.data.labels.shift();
            cpuChart.data.datasets[0].data.shift();
        }

        ramChart.data.labels.push(currentTime);
        ramChart.data.datasets[0].data.push(ramUsage);
        ramChart.update();

        cpuChart.data.labels.push(currentTime);
        cpuChart.data.datasets[0].data.push(cpuUsage);
        cpuChart.update();
    }
});
