
<?php
require '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'];
    $idprograma = $_POST['idprograma'];
    try {
        $stmt = $pdo->prepare("INSERT INTO ficha (nficha, idprograma) VALUES (?, ?)");
        $stmt->execute([$numero, $idprograma]);
        header("Location: ../../views/ficha.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/ficha.php?mensaje=error");
        exit();
    }
}
?>