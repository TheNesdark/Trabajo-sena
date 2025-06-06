<?php
include __DIR__ . '/../config.php';
function listar($tabla){
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM $tabla");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al consultar la tabla $tabla: " . $e->getMessage());
    }
}

function listarReportes(){
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT reportes.idreporte, aprendiz.nombres, aprendiz.apellidos, reportes.fallas, reportes.nficha, reportes.fecha, reportes.estado FROM reportes INNER JOIN aprendiz ON reportes.idaprendiz = aprendiz.idaprendiz;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al consultar la tabla reportes: " . $e->getMessage());
    }

}