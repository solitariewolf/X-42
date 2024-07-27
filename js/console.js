document.addEventListener('DOMContentLoaded', function() {
    const ramCtx = document.getElementById('ram-chart').getContext('2d');
    const cpuCtx = document.getElementById('cpu-chart').getContext('2d');
    const consoleOutput = document.getElementById('console-output');
    const terminalInput = document.getElementById('console-command');
    const sendCommandBtn = document.getElementById('send-command-btn');

    const ramChart = new Chart(ramCtx, {
        type: 'line',
        data: {
            labels: [],
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
                x: { title: { display: true, text: 'Tempo' } },
                y: { title: { display: true, text: 'Uso de RAM (MB)' } }
            }
        }
    });

    const cpuChart = new Chart(cpuCtx, {
        type: 'line',
        data: {
            labels: [],
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
                x: { title: { display: true, text: 'Tempo' } },
                y: { title: { display: true, text: 'Uso de CPU (%)' } }
            }
        }
    });

    function updateConsole(message) {
        consoleOutput.value += `${message}\n`;
        consoleOutput.scrollTop = consoleOutput.scrollHeight;
    }

    function startLogPolling() {
        setInterval(() => {
            fetch('../logs/bot.log')
                .then(response => response.text())
                .then(data => {
                    consoleOutput.value = data.split('\n').slice(-35).join('\n');
                    consoleOutput.scrollTop = consoleOutput.scrollHeight;
                })
                .catch(error => updateConsole(`Error: ${error.message}`));
        }, 2000);
    }

    document.getElementById('start-btn').addEventListener('click', () => {
        fetch('start_bot.php', { method: 'POST' })
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    updateConsole(`Bot started with PID: ${data.pid}`);
                    startLogPolling();
                } else {
                    updateConsole(`Error: ${data.message}`);
                }
            })
            .catch(error => updateConsole(`Error: ${error.message}`));
    });

    document.getElementById('stop-btn').addEventListener('click', () => {
        fetch('stop_bot.php', { method: 'POST' })
            .then(response => response.text())
            .then(data => {
                try {
                    const jsonData = JSON.parse(data);
                    if (jsonData.status === 'success') {
                        updateConsole('Bot stopped successfully');
                    } else {
                        updateConsole(`Error: ${jsonData.message}`);
                    }
                } catch (error) {
                    updateConsole(`Failed to parse response: ${data}`);
                }
            })
            .catch(error => updateConsole(`Error: ${error.message}`));
    });
    

    document.getElementById('restart-btn').addEventListener('click', () => {
        fetch('restart_bot.php', { method: 'POST' })
            .then(response => response.json())
            .then(data => updateConsole(data.status))
            .catch(error => updateConsole(`Error: ${error.message}`));
    });

    document.getElementById('force-stop-btn').addEventListener('click', () => {
        fetch('force_stop_bot.php', { method: 'POST' })
            .then(response => response.json())
            .then(data => updateConsole(data.status))
            .catch(error => updateConsole(`Error: ${error.message}`));
    });

    // Load initial logs
    fetch('get_logs.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                consoleOutput.value = data.logs.join('\n');
                consoleOutput.scrollTop = consoleOutput.scrollHeight;
            } else {
                console.error('Erro ao carregar logs:', data.message);
            }
        })
        .catch(error => console.error('Erro ao carregar logs:', error));

    sendCommandBtn.addEventListener('click', () => {
        const command = terminalInput.value;
        if (command.trim()) {
            fetch('send_command.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ command })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        updateConsole(data.output);
                        terminalInput.value = '';
                    } else {
                        updateConsole(`Erro ao enviar comando: ${data.message}`);
                    }
                })
                .catch(error => updateConsole(`Erro ao enviar comando: ${error.message}`));
        }
    });

    function updateCharts() {
        const currentTime = new Date().toLocaleTimeString();
        const ramUsage = Math.random() * 1000; // Replace with actual data
        const cpuUsage = Math.random() * 100;  // Replace with actual data

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

    setInterval(updateCharts, 2000); // Update charts every 2 seconds
});
