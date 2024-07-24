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

    document.getElementById('start-btn').addEventListener('click', function() {
        // Lógica para iniciar o bot
        appendToTerminal('Iniciar bot');
    });

    document.getElementById('restart-btn').addEventListener('click', function() {
        // Lógica para reiniciar o bot
        appendToTerminal('Reiniciar bot');
    });

    document.getElementById('stop-btn').addEventListener('click', function() {
        // Lógica para parar o bot
        appendToTerminal('Parar bot');
    });

    document.getElementById('force-stop-btn').addEventListener('click', function() {
        // Lógica para forçar a parada do bot
        appendToTerminal('Forçar parada do bot');
    });

    document.getElementById('stats-btn').addEventListener('click', function() {
        // Lógica para atualizar estatísticas
        appendToTerminal('Atualizar estatísticas');
        updateCharts(ramChart, cpuChart);
    });

    sendCommandBtn.addEventListener('click', function() {
        const command = terminalInput.value.trim();
        if (command) {
            appendToTerminal(`Comando: ${command}`);
            // Lógica para processar o comando
            terminalInput.value = '';
        }
    });

    terminalInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendCommandBtn.click();
        }
    });

    function appendToTerminal(message) {
        const messageElement = document.createElement('div');
        messageElement.textContent = message;
        terminalOutput.appendChild(messageElement);
        terminalOutput.scrollTop = terminalOutput.scrollHeight;
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
