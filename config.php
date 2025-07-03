<?php
$host = 'sql304.infinityfree.com';
$port = 3306;
$dbname = 'if0_39135649_desercion';
$user = 'if0_39135649';
$pass = 'WZxe1aUfXcQH';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
