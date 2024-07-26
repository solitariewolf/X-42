document.addEventListener('DOMContentLoaded', function() {
    const configForm = document.getElementById('config-form');

    configForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const token = document.getElementById('token').value;
        const appId = document.getElementById('app-id').value;
        const clientSecret = document.getElementById('client-secret').value;

        const configData = {
            token: token,
            appId: appId,
            clientSecret: clientSecret
        };

        fetch('../save_config.php', { // Ajuste o caminho conforme necessário
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(configData)
        })
        .then(response => response.json().catch(() => {
            return { success: false, message: 'Invalid JSON response from server' };
        }))
        .then(data => {
            if (data.success) {
                alert('Configuração salva com sucesso!');
            } else {
                alert('Erro ao salvar configuração: ' + (data.message || 'Erro desconhecido'));
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao salvar configuração.');
        });
    });
});
