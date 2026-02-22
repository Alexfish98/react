<?php
// Subdomain Finder Proxy (crt.sh)
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$domain = $_GET['domain'] ?? '';

if (!$domain) {
    echo json_encode(['error' => 'Domain required']);
    exit;
}

// Validate domain
if (!preg_match('/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $domain)) {
    echo json_encode(['error' => 'Invalid domain format']);
    exit;
}

$url = "https://crt.sh/?q=%25." . urlencode($domain) . "&output=json";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200 && $response) {
    echo $response;
} else {
    echo json_encode(['error' => 'Failed to fetch data from crt.sh']);
}
?>
