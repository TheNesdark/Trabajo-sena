<?php
$host = 'ballast.proxy.rlwy.net';
$port = 47983;
$dbname = 'railway';
$user = 'root';
$pass = 'IDRSUAqrTVmtEahZwokeSfgcqSGazfov';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);
    // Opcional: activar errores como excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión exitosa con PDO";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
