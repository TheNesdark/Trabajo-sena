<?php
require '../config.php';

function listarMotivos() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM motivo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        header("Location: ../../views/motivo.php?mensaje=error");
        exit();
    }
}
?>