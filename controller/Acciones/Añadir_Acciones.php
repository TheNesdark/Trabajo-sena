<?php
session_start();
include '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $idreporte = $_POST['idreporte'];
    $usuario = $_SESSION['usuario'];

    try {
        $stmt = $pdo->prepare("INSERT INTO acciones (idreporte, fecha, descripcion, usuario) VALUES (?, now(), ?, ?)");
        $stmt->execute([$idreporte, $descripcion, $usuario]);
        header("Location: ../../views/acciones.php?mensaje=agregado&idreporte=$idreporte");
        exit();
    } catch (PDOException $e) {
        die("Error al agregar la acción: " . $e->getMessage());
    }
}
?>