<?php
session_start();
header('Content-Type: application/json'); // Adicionar cabeçalho de conteúdo JSON

if (!isset($_SESSION['login'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['token']) && isset($data['appId']) && isset($data['clientSecret'])) {
    $config = [
        'token' => $data['token'],
        'appId' => $data['appId'],
        'clientSecret' => $data['clientSecret']
    ];

    $configDir = __DIR__ . '/config'; // Diretório do config.json

    // Certifique-se de que o diretório de configuração existe
    if (!is_dir($configDir)) {
        mkdir($configDir, 0777, true); // Cria o diretório se não existir
    }

    if (file_put_contents($configDir . '/config.json', json_encode($config, JSON_PRETTY_PRINT))) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save configuration']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
