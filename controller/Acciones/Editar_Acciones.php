<?php
session_start();
include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idaccion = $_POST['idaccion'];
    $descripcion = $_POST['descripcion'];
        $idreporte = $_POST['idreporte'];
    try {
        $stmt = $pdo->prepare("UPDATE acciones SET descripcion = ? WHERE idaccion = ?");
        $stmt->execute([$descripcion, $idaccion]);
        header("Location: ../../views/acciones.php?mensaje=actualizado&idreporte=$idreporte");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/acciones.php?mensaje=error&idreporte=$idreporte");
        exit();
    }
}
?>