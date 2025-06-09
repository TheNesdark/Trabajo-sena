<?php
require '../config.php';

function listarUsuarios() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al consultar la tabla usuarios: " . $e->getMessage());
    }
}

?>