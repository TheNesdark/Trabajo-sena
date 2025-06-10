<?php

include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idaccion = $_POST['idaccion'];
    $descripcion = $_POST['descripcion'];
    try {
        $stmt = $pdo->prepare("UPDATE acciones SET descripcion = ? WHERE idaccion = ?");
        $stmt->execute([$descripcion, $idaccion]);
        header("Location: ../../views/acciones.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/acciones.php?mensaje=error");
        exit();
    }
}
?>