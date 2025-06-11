<?php
include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idreporte = $_POST['idreporte'];
    $idaprendiz = $_POST['idaprendiz'];
    $idficha = $_POST['idficha'];
    $idmotivo = $_POST['idmotivo'];
    $fallas = $_POST['fallas'];
    $observaciones = $_POST['observaciones'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];
    try {
        $stmt = $pdo->prepare("UPDATE reporte SET idaprendiz=?, idficha=?, idmotivo=?, fallas=?, observaciones=?, estado=?, fecha=? WHERE idreporte=?");
        $stmt->execute([$idaprendiz, $idficha, $idmotivo, $fallas, $observaciones, $estado, $fecha, $idreporte]);
        header("Location: ../../views/reportes.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/reportes.php?mensaje=error");
        exit();
    }
}
?>