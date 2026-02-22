<?php
require 'db.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

$data = json_decode(file_get_contents('php://input'), true);

$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Try to get location from Cloudflare headers (if behind proxy)
$country = $_SERVER['HTTP_CF_IPCOUNTRY'] ?? 'Unknown';
$city = $_SERVER['HTTP_CF_IPCITY'] ?? '';
$region = $_SERVER['HTTP_CF_REGION_CODE'] ?? '';
$latitude = $_SERVER['HTTP_CF_IPLATITUDE'] ?? 0;
$longitude = $_SERVER['HTTP_CF_IPLONGITUDE'] ?? 0;

// Simple UA Parsing (Optional: Use a library)
$device = 'Desktop';
if (preg_match('/Mobile|Android|iPhone|iPad/i', $userAgent)) {
    $device = 'Mobile';
} elseif (preg_match('/Tablet/i', $userAgent)) {
    $device = 'Tablet';
}

$browser = 'Unknown';
if (preg_match('/Chrome/i', $userAgent)) $browser = 'Chrome';
elseif (preg_match('/Firefox/i', $userAgent)) $browser = 'Firefox';
elseif (preg_match('/Safari/i', $userAgent) && !preg_match('/Chrome/i', $userAgent)) $browser = 'Safari';
elseif (preg_match('/Edge/i', $userAgent)) $browser = 'Edge';
elseif (preg_match('/Opera|OPR/i', $userAgent)) $browser = 'Opera';

$os = 'Unknown';
if (preg_match('/Windows/i', $userAgent)) $os = 'Windows';
elseif (preg_match('/Mac/i', $userAgent)) $os = 'MacOS';
elseif (preg_match('/Linux/i', $userAgent)) $os = 'Linux';
elseif (preg_match('/Android/i', $userAgent)) $os = 'Android';
elseif (preg_match('/iPhone|iPad/i', $userAgent)) $os = 'iOS';

$path = $data['path'] ?? '/';

$stmt = $pdo->prepare("INSERT INTO visits (ip_address, user_agent, browser, os, device, path, country, region, city, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$ip, $userAgent, $browser, $os, $device, $path, $country, $region, $city, $latitude, $longitude]);

echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
?>
