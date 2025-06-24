
<?php
require '../../config.php';
if (isset($_GET['id'])) {
    $idaprendiz = $_GET['id'];
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