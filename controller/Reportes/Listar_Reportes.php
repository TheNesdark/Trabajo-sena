<?php
require '../config.php';

function listarReportes($pagina, $limite) {
    global $pdo;

    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    try {
        if ($busqueda !== '') {
            $sql = "
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
                LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
        } else {
            $sql = "
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
                LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        error_log('Error en listarReportes: ' . $e->getMessage());
        header("Location: ../../views/Reportes.php?mensaje=error");
        exit();
    }
}
?>


