<?php
$file_name = $_POST['file_name'];
$path = 'pastas';

// Encontra a pasta onde o arquivo está localizado
foreach (glob("$path/*") as $folder) {
    if (is_file("$folder/$file_name")) {
        if (unlink("$folder/$file_name")) {
            echo "Arquivo excluído com sucesso.";
        } else {
            echo "Erro ao excluir o arquivo.";
        }
        exit;
    }
}

echo "Arquivo não encontrado.";
?>
