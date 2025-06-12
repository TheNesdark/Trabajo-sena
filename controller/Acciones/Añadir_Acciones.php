<?php

include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcion = $_POST['descripcion'];
    $idreporte = $_POST['idreporte'];
    try {
        $stmt = $pdo->prepare("INSERT INTO acciones (idreporte,fecha,descripcion,usuario) VALUES ( ?, now(), ?, 'andresB')");
        $stmt->execute([$idreporte, $descripcion]);
        header("Location: ../../views/acciones.php?mensaje=agregado&idreporte=$idreporte&aprendiz=$idaprendiz");
        exit();
    } catch (PDOException $e) {
        die("Error al agregar la acción: " . $e->getMessage());
    }
}
?>