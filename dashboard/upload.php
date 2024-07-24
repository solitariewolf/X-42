<?php
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $folder_name = $_POST['folder_name'];
    $upload_dir = "pastas/$folder_name/";
    $upload_file = $upload_dir . basename($_FILES['file']['name']);

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
        echo "Arquivo enviado com sucesso.";
    } else {
        echo "Erro ao enviar o arquivo.";
    }
} else {
    echo "Erro ao fazer upload do arquivo.";
}
?>
