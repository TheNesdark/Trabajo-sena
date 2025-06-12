<?php
session_start();
include '../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($usuario === '' || $password === '') {
        $_SESSION['login_error'] = 'Por favor, complete todos los campos.';
        header('Location: ../../views/login.php');
        exit();
    }

    $sql = "SELECT usuario, nombre, password FROM usuarios WHERE usuario = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            header('Location: ../../index.php');
            exit();
        } else {
            $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
        }
    } else {
        $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
    }

    header('Location: ../../views/login.php');
    exit();
} else {
    header('Location: ../../views/login.php');
    exit();
}
?>