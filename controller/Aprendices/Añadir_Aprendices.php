<?php
require '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idaprendiz = $_POST['idaprendiz'];
    $tipodoc = $_POST['tipodoc'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $nficha = $_POST['nficha'];
    try {
        $stmt = $pdo->prepare("INSERT INTO aprendiz (idaprendiz, tipodoc, nombres, apellidos, celular, email, direccion, nficha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$idaprendiz, $tipodoc, $nombres, $apellidos, $celular, $email, $direccion, $nficha]);
        header("Location: ../../views/aprendiz.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/aprendiz.php?mensaje=error&error=" . urlencode($e->getMessage()));
        exit();
    }
}
?>