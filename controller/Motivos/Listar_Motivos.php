<?php
require '../config.php';

function listarMotivos() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM motivo WHERE nombre_motivo LIKE :busqueda OR codigo_motivo LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM motivo");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
