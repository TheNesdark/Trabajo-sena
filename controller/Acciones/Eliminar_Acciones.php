<?php
session_start();
require '../../config.php';
if (isset($_GET['id'])) {
    $idaccion = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM acciones WHERE idaccion = ?");
        $stmt->execute([$idaccion]);
        header("Location: ../../views/acciones.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/acciones.php?mensaje=error");
        exit();
    }
}
?>