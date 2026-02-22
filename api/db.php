<?php
// Database Connection
$host = 'localhost';
$dbname = 'awrorakm_analytics';
$user = 'awrorakm_iq';
$pass = 'alex,2025,alex';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Fallback to SQLite if MySQL fails (e.g. local dev)
    $dbPath = __DIR__ . '/tracker.db';
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

// Create tables if not exist (MySQL Compatible)
// Note: We use a try-catch block or check driver to adjust SQL syntax if needed, 
// but here we'll try to use syntax compatible with both or specific to the active connection.

$driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

if ($driver === 'mysql') {
    $pdo->exec("CREATE TABLE IF NOT EXISTS visits (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ip_address VARCHAR(45),
        user_agent TEXT,
        browser VARCHAR(255),
        os VARCHAR(255),
        device VARCHAR(255),
        path VARCHAR(255),
        country VARCHAR(255),
        region VARCHAR(255),
        city VARCHAR(255),
        latitude FLOAT,
        longitude FLOAT,
        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) UNIQUE,
        password VARCHAR(255)
    )");
} else {
    // SQLite Fallback
    $pdo->exec("CREATE TABLE IF NOT EXISTS visits (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        ip_address TEXT,
        user_agent TEXT,
        browser TEXT,
        os TEXT,
        device TEXT,
        path TEXT,
        country TEXT,
        region TEXT,
        city TEXT,
        latitude REAL,
        longitude REAL,
        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE,
        password TEXT
    )");
}

// Default admin
try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = 'admin'");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("INSERT INTO admins (username, password) VALUES ('admin', 'admin123')");
    }
} catch (Exception $e) {
    // Ignore if table doesn't exist yet or other error
}
?>
