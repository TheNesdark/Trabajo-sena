<?php
include '../../config.php';
if (isset($_GET['id'])) {
    $idreporte = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM reporte WHERE idreporte = ?");
        $stmt->execute([$idreporte]);
        header("Location: ../../views/reportes.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/reportes.php?mensaje=error");
        exit();
    }
}
?>