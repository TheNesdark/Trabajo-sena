<?php
require '../config.php';

function listarReportes() {
    global $pdo;
    $busqueda = '';
    try {
        if (isset($_GET['busqueda']) && $_GET['busqueda'] !== '') {
            $busqueda = $_GET['busqueda'];
            $stmt = $pdo->prepare("
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
                WHERE aprendiz.nombres LIKE :busqueda
                   OR aprendiz.idaprendiz LIKE :busqueda
            ");
            $stmt->execute([':busqueda' => "%$busqueda%"]);
        } else {
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
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        header("Location: ../../views/Reportes.php?mensaje=error");
        exit();
    }
}
?>

