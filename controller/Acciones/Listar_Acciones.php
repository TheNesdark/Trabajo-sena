<?php
require '../config.php';

function listarAcciones() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM accion WHERE nombre_accion LIKE :busqueda OR codigo_accion LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM accion");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
