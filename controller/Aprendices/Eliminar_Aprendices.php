
<?php
include '../../config.php';
if (isset($_GET['idaprendiz'])) {
    $idaprendiz = $_GET['idaprendiz'];
    try {
        $stmt = $pdo->prepare("DELETE FROM aprendiz WHERE idaprendiz = ?");
        $stmt->execute([$idaprendiz]);
        header("Location: ../../views/aprendiz.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/aprendiz.php?mensaje=erroraprendiz");
        exit();
    }
}
?>