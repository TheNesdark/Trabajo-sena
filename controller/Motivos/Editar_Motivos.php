<?php
include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idmotivo = $_POST['idmotivo'];
    $descripcion = $_POST['descripcion'];
    try {
        $stmt = $pdo->prepare("UPDATE motivo SET descripcion = ? WHERE idmotivo = ?");
        $stmt->execute([$descripcion, $idmotivo]);
        header("Location: ../../views/motivo.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/motivo.php?mensaje=error");
        exit();
    }
}
?>