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

document.addEventListener('DOMContentLoaded', function() {
    loadFolders();
    loadFolderOptions();

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
            loadFolders();
            loadFolderOptions();
        })
        .catch(error => console.error('Error:', error));
    });

    document.getElementById('rename-folder-btn').addEventListener('click', renameFolder);
    document.getElementById('delete-folder-btn').addEventListener('click', deleteFolder);
    document.getElementById('rename-file-btn').addEventListener('click', renameFile);
    document.getElementById('delete-file-btn').addEventListener('click', deleteFile);
    document.getElementById('upload-btn').addEventListener('click', uploadFile);
});

function loadFolders() {
    fetch('list_folders.php')
    .then(response => response.json())
    .then(data => {
        const folderList = document.getElementById('folder-list');
        folderList.innerHTML = '';

        data.forEach(folder => {
            const folderItem = document.createElement('div');
            folderItem.className = 'folder';
            folderItem.innerHTML = `<input type="checkbox" class="folder-checkbox"><i class="fas fa-folder"></i> ${folder}`;
            folderItem.querySelector('.folder-checkbox').addEventListener('click', (e) => e.stopPropagation());
            folderItem.addEventListener('click', () => openFolder(folder));
            folderList.appendChild(folderItem);
        });
    })
    .catch(error => console.error('Error:', error));
}

function loadFolderOptions() {
    fetch('list_folders.php')
    .then(response => response.json())
    .then(data => {
        const folderSelect = document.getElementById('folder-select');
        folderSelect.innerHTML = '';

        data.forEach(folder => {
            const option = document.createElement('option');
            option.value = folder;
            option.textContent = folder;
            folderSelect.appendChild(option);
        });
    })
    .catch(error => console.error('Error:', error));
}

function openFolder(folderName) {
    fetch('list_files.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'folder_name=' + encodeURIComponent(folderName)
    })
    .then(response => response.json())
    .then(data => {
        const fileList = document.getElementById('file-list');
        fileList.innerHTML = '';

        data.forEach(file => {
            const fileItem = document.createElement('div');
            fileItem.className = 'file';
            fileItem.innerHTML = `<input type="checkbox" class="file-checkbox"><i class="fas fa-file-audio"></i> ${file}`;
            fileItem.querySelector('.file-checkbox').addEventListener('click', (e) => e.stopPropagation());
            fileList.appendChild(fileItem);
        });
    })
    .catch(error => console.error('Error:', error));
}

function renameFolder() {
    const checkboxes = document.querySelectorAll('.folder-checkbox');
    const newFolderName = document.getElementById('new-folder-name').value;
    let selectedFolder;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            selectedFolder = checkbox.parentElement.textContent.trim();
        }
    });

    if (!selectedFolder || !newFolderName) {
        alert('Selecione uma pasta e insira um novo nome.');
        return;
    }

    fetch('rename_folder.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'old_name=' + encodeURIComponent(selectedFolder) + '&new_name=' + encodeURIComponent(newFolderName)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        loadFolders();
        loadFolderOptions();
    })
    .catch(error => console.error('Error:', error));
}

function deleteFolder() {
    const checkboxes = document.querySelectorAll('.folder-checkbox');
    let selectedFolder;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            selectedFolder = checkbox.parentElement.textContent.trim();
        }
    });

    if (!selectedFolder) {
        alert('Selecione uma pasta para excluir.');
        return;
    }

    fetch('delete_folder.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'folder_name=' + encodeURIComponent(selectedFolder)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        loadFolders();
        loadFolderOptions();
    })
    .catch(error => console.error('Error:', error));
}

function renameFile() {
    const checkboxes = document.querySelectorAll('.file-checkbox');
    const newFileName = document.getElementById('new-file-name').value;
    let selectedFile;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            selectedFile = checkbox.parentElement.textContent.trim();
        }
    });

    if (!selectedFile || !newFileName) {
        alert('Selecione um arquivo e insira um novo nome.');
        return;
    }

    fetch('rename_file.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'old_name=' + encodeURIComponent(selectedFile) + '&new_name=' + encodeURIComponent(newFileName)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Recarregar a pasta atual para atualizar a lista de arquivos
        const currentFolder = document.querySelector('.folder-checkbox:checked').parentElement.textContent.trim();
        openFolder(currentFolder);
    })
    .catch(error => console.error('Error:', error));
}

function deleteFile() {
    const checkboxes = document.querySelectorAll('.file-checkbox');
    let selectedFile;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            selectedFile = checkbox.parentElement.textContent.trim();
        }
    });

    if (!selectedFile) {
        alert('Selecione um arquivo para excluir.');
        return;
    }

    fetch('delete_file.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'file_name=' + encodeURIComponent(selectedFile)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Recarregar a pasta atual para atualizar a lista de arquivos
        const currentFolder = document.querySelector('.folder-checkbox:checked').parentElement.textContent.trim();
        openFolder(currentFolder);
    })
    .catch(error => console.error('Error:', error));
}

function uploadFile() {
    const folderSelect = document.getElementById('folder-select');
    const fileInput = document.getElementById('file-upload');
    const selectedFolder = folderSelect.value;
    const file = fileInput.files[0];

    if (!selectedFolder || !file) {
        alert('Selecione uma pasta e um arquivo para upload.');
        return;
    }

    const formData = new FormData();
    formData.append('file', file);
    formData.append('folder_name', selectedFolder);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        openFolder(selectedFolder);
    })
    .catch(error => console.error('Error:', error));
}
