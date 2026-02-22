<?php
// Uptime Monitor
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$url = $_GET['url'] ?? '';

if (!filter_var($url, FILTER_VALIDATE_URL)) {
    echo json_encode(['status' => 0, 'latency' => 0, 'error' => 'Invalid URL']);
    exit;
}

$start = microtime(true);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true); // HEAD request
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'UptimeMonitor/1.0');

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

$end = microtime(true);
$latency = round(($end - $start) * 1000);

if ($httpCode > 0) {
    echo json_encode(['status' => $httpCode, 'latency' => $latency]);
} else {
    echo json_encode(['status' => 0, 'latency' => 0, 'error' => $error]);
}
?>
