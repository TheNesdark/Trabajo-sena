<?php
include '../../config.php';
function Consultar($tabla){
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM $tabla");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al consultar la tabla $tabla: " . $e->getMessage());
    }
}