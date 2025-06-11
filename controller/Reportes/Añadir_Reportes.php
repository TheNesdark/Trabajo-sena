<?php
include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idaprendiz = $_POST['idaprendiz'];
    $idficha = $_POST['idficha'];
    $idmotivo = $_POST['idmotivo'];
    $fallas = $_POST['fallas'];
    $observaciones = $_POST['observaciones'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];
    try {
        $stmt = $pdo->prepare("INSERT INTO reporte (idaprendiz, idficha, idmotivo, fallas, observaciones, estado, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$idaprendiz, $idficha, $idmotivo, $fallas, $observaciones, $estado, $fecha]);
        header("Location: ../../views/reportes.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/reportes.php?mensaje=error");
        exit();
    }
}
?>