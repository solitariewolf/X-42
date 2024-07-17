document.getElementById('create-folder-form').addEventListener('submit', function(e) {
    e.preventDefault();

    let folderName = this.folder_name.value;

    fetch('create_folder.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'folder_name=' + encodeURIComponent(folderName)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Adicione lógica para atualizar a lista de pastas, se necessário
    })
    .catch(error => console.error('Error:', error));
});
