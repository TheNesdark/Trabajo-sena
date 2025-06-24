
<?php
require '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idficha = $_POST['idficha'];
    $numero = $_POST['numero'];
    $idprograma = $_POST['idprograma'];
    try {
        $stmt = $pdo->prepare("UPDATE ficha SET numero = ?, idprograma = ? WHERE idficha = ?");
        $stmt->execute([$numero, $idprograma, $idficha]);
        header("Location: ../../views/ficha.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/ficha.php?mensaje=error");
        exit();
    }
}
?>