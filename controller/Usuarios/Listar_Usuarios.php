<?php
require '../config.php';

function listarUsuarios() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre LIKE :busqueda" );
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM usuarios");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
