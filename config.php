<?php
$host = 'ballast.proxy.rlwy.net';
$port = 47983;
$dbname = 'railway';
$user = 'root';
$pass = 'IDRSUAqrTVmtEahZwokeSfgcqSGazfov';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
