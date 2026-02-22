<?php
// Simple CORS Proxy for File Downloader
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

if (!isset($_GET['url'])) {
    http_response_code(400);
    die('URL required');
}

$url = $_GET['url'];

// Basic validation
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    http_response_code(400);
    die('Invalid URL');
}

// Fetch file
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false); // Stream directly
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');

// Pass through content type
curl_setopt($ch, CURLOPT_HEADERFUNCTION, function($curl, $header) {
    $len = strlen($header);
    $header = explode(':', $header, 2);
    if (count($header) < 2) return $len;

    $name = strtolower(trim($header[0]));
    if (in_array($name, ['content-type', 'content-length', 'content-disposition'])) {
        header(trim($header[0]) . ': ' . trim($header[1]));
    }
    return $len;
});

curl_exec($ch);
curl_close($ch);
?>
