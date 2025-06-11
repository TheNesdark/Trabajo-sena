<?php
include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idaprendiz = $_POST['idaprendiz'];
    $nficha = $_POST['nficha'];
    $idmotivo = $_POST['idmotivo'];
    $fallas = $_POST['fallas'];
    $observaciones = $_POST['observaciones'];
    $estado = $_POST['estado'];

    try {
        $stmt = $pdo->prepare("INSERT INTO reportes (idaprendiz, nficha, idmotivo, fallas, observaciones, estado, fecha) VALUES (?, ?, ?, ?, ?, ?, now())");
        $stmt->execute([$idaprendiz, $nficha, $idmotivo, $fallas, $observaciones, $estado]);
        header("Location: ../../views/reportes.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/reportes.php?mensaje=error");
        exit();
    }
}
?>