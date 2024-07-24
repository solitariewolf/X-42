<?php
$folder_name = $_POST['folder_name'];
$path = "pastas/$folder_name";

if (is_dir($path)) {
    $files = array_diff(scandir($path), array('.', '..'));
    echo json_encode(array_values($files));
} else {
    echo json_encode([]);
}
?>
