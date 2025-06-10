<?php

include '../../config.php';
if (isset($_GET['id'])) {
    $idmotivo = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM motivo WHERE idmotivo = ?");
        $stmt->execute([$idmotivo]);
        header("Location: ../../views/motivo.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        die("Error al eliminar el motivo: " . $e->getMessage());
    }
}
?>