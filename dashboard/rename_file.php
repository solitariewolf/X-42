<?php
$old_name = $_POST['old_name'];
$new_name = $_POST['new_name'];
$path = 'pastas';

// Encontra a pasta onde o arquivo está localizado
foreach (glob("$path/*") as $folder) {
    if (is_file("$folder/$old_name")) {
        $folder_name = basename($folder);
        if (rename("$folder/$old_name", "$folder/$new_name")) {
            echo "Arquivo renomeado com sucesso.";
        } else {
            echo "Erro ao renomear o arquivo.";
        }
        exit;
    }
}

echo "Arquivo não encontrado.";
?>
