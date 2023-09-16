<?php
// database handler

$host = 'localhost';
$dbame = 'phpdatabase';
$dbusername = 'root';
$dbpassword = '';

$dsn = "mysql:host=localhost;dbname=phpdatabase";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e -> getMessage());
}