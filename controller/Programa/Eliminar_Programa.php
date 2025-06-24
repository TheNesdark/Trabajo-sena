
<?php
require '../../config.php';
if (isset($_GET['id'])) {
    $idprograma = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM programa WHERE idprograma = ?");
        $stmt->execute([$idprograma]);
        header("Location: ../../views/programa.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/programa.php?mensaje=errorprograma");
        exit();
    }
}
?>