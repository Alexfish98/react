<?php
// Port Scanner
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = $_GET['host'] ?? '';
$port = intval($_GET['port'] ?? 0);

if (!$host || !$port) {
    echo json_encode(['error' => 'Host and port required']);
    exit;
}

$connection = @fsockopen($host, $port, $errno, $errstr, 2);

if (is_resource($connection)) {
    echo json_encode(['status' => 'open']);
    fclose($connection);
} else {
    echo json_encode(['status' => 'closed']);
}
?>
