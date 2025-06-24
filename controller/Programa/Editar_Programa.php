
<?php
require '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idprograma = $_POST['idprograma'];
    $nombre = $_POST['nombre'];
    try {
        $stmt = $pdo->prepare("UPDATE programa SET nombreprograma = ? WHERE idprograma = ?");
        $stmt->execute([$nombre, $idprograma]);
        header("Location: ../../views/programa.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/programa.php?mensaje=error");
        exit();
    }
}
?>