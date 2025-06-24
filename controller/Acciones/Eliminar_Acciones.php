<?php
session_start();
require '../../config.php';
if (isset($_GET['id'])) {
    $idaccion = $_GET['id'];
    $idreporte = $_GET['idreporte'];
    try {
        $stmt = $pdo->prepare("DELETE FROM acciones WHERE idaccion = ?");
        $stmt->execute([$idaccion]);
        header("Location: ../../views/acciones_reportes.php?mensaje=eliminado&idreporte=$idreporte");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/acciones_reportes.php?mensaje=error&idreporte=$idreporte");
        exit();
    }
}
?>