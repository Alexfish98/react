<?php
// Simple WHOIS Lookup
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (!isset($_GET['domain'])) {
    echo json_encode(['error' => 'Domain required']);
    exit;
}

$domain = trim($_GET['domain']);
// Remove protocol if present
$domain = preg_replace('#^https?://#', '', $domain);
// Get TLD
$parts = explode('.', $domain);
$tld = end($parts);

$servers = [
    'com' => 'whois.verisign-grs.com',
    'net' => 'whois.verisign-grs.com',
    'org' => 'whois.pir.org',
    'io' => 'whois.nic.io',
    'co' => 'whois.nic.co',
    'uk' => 'whois.nic.uk',
    'ca' => 'whois.cira.ca',
    'au' => 'whois.auda.org.au',
    'de' => 'whois.denic.de',
    'fr' => 'whois.nic.fr',
    'info' => 'whois.afilias.net',
    'biz' => 'whois.biz',
    'us' => 'whois.nic.us',
    'me' => 'whois.nic.me',
    'xyz' => 'whois.nic.xyz'
];

$server = $servers[$tld] ?? 'whois.iana.org';

function queryWhois($server, $domain) {
    $fp = fsockopen($server, 43, $errno, $errstr, 10);
    if (!$fp) return "Error: $errno - $errstr";
    
    $out = $domain . "\r\n";
    fwrite($fp, $out);
    
    $res = "";
    while (!feof($fp)) {
        $res .= fgets($fp, 128);
    }
    fclose($fp);
    return $res;
}

$raw = queryWhois($server, $domain);

// If IANA gave us a referral server, query that
if (preg_match('/refer:\s+(.+)/i', $raw, $matches)) {
    $referralServer = trim($matches[1]);
    $raw = queryWhois($referralServer, $domain);
}

echo json_encode(['data' => $raw]);
?>
