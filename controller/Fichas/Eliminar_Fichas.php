<?php
require '../../config.php';
if (isset($_GET['id'])) {
    $nficha = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM ficha WHERE nficha = ?");
        $stmt->execute([$nficha]);
        header("Location: ../../views/ficha.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/ficha.php?mensaje=errorficha");
        exit();

    }
}
?>