<?php
include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, nombre, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$usuario, $nombre, $email, $password]);
        header("Location: ../../views/Usuarios.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        die("Error al insertar el usuario: " . $e->getMessage());
    }
}

?>