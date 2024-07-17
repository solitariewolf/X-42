<?php
if (isset($_POST['folder_name'])) {
    $folder_name = $_POST['folder_name'];
    $path = 'pastas/' . $folder_name;

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
        echo "Folder created successfully.";
    } else {
        echo "Folder already exists.";
    }
} else {
    echo "No folder name provided.";
}
?>
