<?php
require_once __DIR__ . '/env.php';

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT;
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
    //echo "Kết nối thành công";
} catch (PDOException $e) {
    die("Kết nối CSDL thất bại: " . $e->getMessage());
}
