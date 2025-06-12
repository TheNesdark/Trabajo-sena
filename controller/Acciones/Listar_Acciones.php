<?php
require '../config.php';

function listarAcciones() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM accion WHERE idaccion LIKE :busqueda OR descripcion LIKE :busqueda OR usuario LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM acciones");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
