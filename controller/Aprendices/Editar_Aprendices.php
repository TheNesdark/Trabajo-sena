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
    try {
        $stmt = $pdo->prepare("UPDATE aprendiz SET tipodoc=?, nombres=?, apellidos=?, celular=?, email=?, direccion=? WHERE idaprendiz=?");
        $stmt->execute([$tipodoc, $nombres, $apellidos, $celular, $email, $direccion, $idaprendiz]);
        header("Location: ../../views/aprendiz.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/aprendiz.php?mensaje=error");
        exit();
    }
}
?>