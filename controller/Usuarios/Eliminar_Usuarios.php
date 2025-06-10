<?php
include '../../config.php';
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];
    try {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        header("Location: ../../views/Usuarios.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/Usuarios.php?mensaje=error");
        exit();
    }
}
?>