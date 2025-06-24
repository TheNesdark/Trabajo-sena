<?php
require '../config.php';
$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

function listarReportes($pagina, $limite) {
    global $pdo;

    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    try {
        if ($busqueda !== '') {
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
                WHERE aprendiz.nombres LIKE ?
                   OR aprendiz.apellidos LIKE ?
                   OR aprendiz.idaprendiz LIKE ?
                   OR ficha.nficha LIKE ?
                   OR programa.nombreprograma LIKE ?
                LIMIT $offset, $limite
            ");
            $stmt->execute(['%' . $busqueda . '%', '%' . $busqueda . '%', '%' . $busqueda . '%', '%' . $busqueda . '%', '%' . $busqueda . '%']);
        } else {
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
                LIMIT $offset, $limite
            ");
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error al listar reportes: " . $e->getMessage();
        return [];
    }
}
?>

