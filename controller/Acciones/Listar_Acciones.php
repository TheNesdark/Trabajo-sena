<?php
require '../config.php';

function listarAcciones() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM acciones");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al consultar la tabla acciones: " . $e->getMessage());
    }
}
?>