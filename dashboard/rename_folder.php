<?php
$old_name = $_POST['old_name'];
$new_name = $_POST['new_name'];
$path = 'pastas';

if (rename("$path/$old_name", "$path/$new_name")) {
    echo "Pasta renomeada com sucesso.";
} else {
    echo "Erro ao renomear a pasta.";
}
?>
