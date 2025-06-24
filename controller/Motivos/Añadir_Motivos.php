<?php
require '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    try {
        $stmt = $pdo->prepare("INSERT INTO motivo (descripcion) VALUES (?)");
        $stmt->execute([$descripcion]);
        header("Location: ../../views/motivo.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/motivo.php?mensaje=error");
        exit();
    }
}
?>