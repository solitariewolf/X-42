<?php
$folder_name = $_POST['folder_name'];
$path = 'pastas';

function deleteDir($dirPath) {
    if (!is_dir($dirPath)) {
        return false;
    }
    $files = array_diff(scandir($dirPath), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dirPath/$file")) ? deleteDir("$dirPath/$file") : unlink("$dirPath/$file");
    }
    return rmdir($dirPath);
}

if (deleteDir("$path/$folder_name")) {
    echo "Pasta excluída com sucesso.";
} else {
    echo "Erro ao excluir a pasta.";
}
?>
