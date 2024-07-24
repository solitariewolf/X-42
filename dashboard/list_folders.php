<?php
$path = 'pastas';
$folders = array_filter(glob($path . '/*'), 'is_dir');
$folder_names = array_map(function($folder) use ($path) {
    return str_replace($path . '/', '', $folder);
}, $folders);

header('Content-Type: application/json');
echo json_encode($folder_names);
?>
