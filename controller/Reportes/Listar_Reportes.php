<?php
require '../config.php';

function listarUsuarios() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        header("Location: ../../views/Usuarios.php?mensaje=error");
        exit();
    }
}

function listarReportes() {
    global $pdo;
    try {
        $stmt = $pdo->query("
            SELECT 
            reportes.idreporte,
            aprendiz.nombres AS nombre_aprendiz,
            aprendiz.apellidos AS apellido_aprendiz,
            ficha.nficha,
            programa.nombreprograma,
            motivo.descripcion AS motivo,
            reportes.fallas,
            reportes.observaciones,
            reportes.estado,
            reportes.fecha
            FROM reportes
            INNER JOIN aprendiz ON reportes.idaprendiz = aprendiz.idaprendiz
            INNER JOIN ficha ON reportes.nficha = ficha.nficha
            INNER JOIN programa ON ficha.idprograma = programa.idprograma
            INNER JOIN motivo ON reportes.idmotivo = motivo.idmotivo
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        header("Location: ../../views/Reportes.php?mensaje=error");
        exit();
    }
}

?>