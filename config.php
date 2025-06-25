<?php
//railway.com/project/31f41bdb-f3c5-4026-86b3-6ff0a2a14327?environmentId=a2c55d63-0860-4561-983d-01b3424659fc
$host = 'localhost';
$db = 'desercion';
$user = 'root';
$pass = '';
$port = 3306;
try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>