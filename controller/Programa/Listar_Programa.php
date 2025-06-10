<?php

require '../config.php';

function listarProgramas() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM programa");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al consultar la tabla programa: " . $e->getMessage());
    }
}
?>