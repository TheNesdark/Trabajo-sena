<?php
include '../../config.php';
if (isset($_GET['idreporte'])) {
    $idreporte = $_GET['idreporte'];
    try {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM reportes WHERE idreporte = ?");
        $stmt->execute([$idreporte]);
        header("Location: ../../views/reportes.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/reportes.php?mensaje=error");
        exit();
    }
}
?>