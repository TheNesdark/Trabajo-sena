<?php

include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    try {
        $stmt = $pdo->prepare("INSERT INTO acciones (descripcion) VALUES (?)");
        $stmt->execute([$descripcion]);
        header("Location: ../../views/acciones.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/acciones.php?mensaje=error");
        exit();
    }
}
?>