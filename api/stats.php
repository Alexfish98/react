<?php
require 'db.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Simple Auth Check
$headers = getallheaders();
$auth = $headers['Authorization'] ?? '';
if (!$auth) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$stats = [
    'general' => ['visitors' => 0, 'pageviews' => 0],
    'ads' => ['count' => 0],
    'bots' => ['count' => 0],
    'chart' => [],
    'countries' => [],
    'devices' => [],
    'recent' => []
];

// Pageviews
$stmt = $pdo->query("SELECT COUNT(*) as count FROM visits");
$stats['general']['pageviews'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

// Visitors
$stmt = $pdo->query("SELECT COUNT(DISTINCT ip_address) as count FROM visits");
$stats['general']['visitors'] = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

// Chart (Last 7 days)
$driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
$sql = "";

if ($driver === 'mysql') {
    $sql = "
        SELECT DATE(timestamp) as date, COUNT(*) as count 
        FROM visits 
        WHERE timestamp >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
        GROUP BY DATE(timestamp) 
        ORDER BY DATE(timestamp) ASC
    ";
} else {
    // SQLite
    $sql = "
        SELECT date(timestamp) as date, COUNT(*) as count 
        FROM visits 
        WHERE timestamp >= date('now', '-7 days') 
        GROUP BY date(timestamp) 
        ORDER BY date(timestamp) ASC
    ";
}

$stmt = $pdo->query($sql);
$stats['chart'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Countries
$stmt = $pdo->query("
    SELECT country, COUNT(*) as count 
    FROM visits 
    GROUP BY country 
    ORDER BY count DESC 
    LIMIT 5
");
$stats['countries'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devices
$stmt = $pdo->query("
    SELECT device, COUNT(*) as count 
    FROM visits 
    GROUP BY device 
    ORDER BY count DESC
");
$stats['devices'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Recent
$stmt = $pdo->query("SELECT * FROM visits ORDER BY timestamp DESC LIMIT 20");
$visits = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($visits as $r) {
    $stats['recent'][] = [
        'ip_address' => $r['ip_address'],
        'city' => $r['city'],
        'country' => $r['country'],
        'browser' => $r['browser'],
        'os' => $r['os'],
        'last_activity' => $r['timestamp']
    ];
}

echo json_encode($stats);
?>
