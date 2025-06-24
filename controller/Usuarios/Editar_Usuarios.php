<?php
require '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    try {
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE usuario = ?");
        $stmt->execute([$nombre, $email, $password, $usuario]);
        header("Location: ../../views/Usuarios.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/Usuarios.php?mensaje=error");
        exit();
    }
}
?>