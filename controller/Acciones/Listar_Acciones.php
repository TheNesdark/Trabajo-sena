<?php
require '../config.php';

$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

function listarAcciones($pagina, $limite) {
    global $pdo;
    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;
    try {
        if ($busqueda !== '') {
            $stmt = $pdo->prepare(
                "SELECT aprendiz.nombres, aprendiz.apellidos, 
                        reportes.idreporte, acciones.descripcion, acciones.idaccion, acciones.usuario, acciones.fecha
                 FROM aprendiz
                 INNER JOIN reportes ON aprendiz.idaprendiz = reportes.idaprendiz
                 INNER JOIN acciones ON reportes.idreporte = acciones.idreporte
                 WHERE acciones.idreporte LIKE :busqueda 
                    OR acciones.descripcion LIKE :busqueda 
                    OR acciones.usuario LIKE :busqueda
                    OR aprendiz.nombres LIKE :busqueda
                    OR aprendiz.apellidos LIKE :busqueda
                 LIMIT $offset, $limite"
            );
            $stmt->execute([':busqueda' => '%' . $busqueda . '%']);
        } else {
            $stmt = $pdo->prepare(
                "SELECT aprendiz.nombres, aprendiz.apellidos, 
                        reportes.idreporte, acciones.descripcion, acciones.idaccion, acciones.usuario, acciones.fecha
                 FROM aprendiz
                 INNER JOIN reportes ON aprendiz.idaprendiz = reportes.idaprendiz
                 INNER JOIN acciones ON reportes.idreporte = acciones.idreporte
                 LIMIT $offset, $limite"
            );
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error al listar acciones: " . $e->getMessage();
        return [];
    }
}

function ListarAccionesReportes($idreporte,$pagina, $limite) {
    global $pdo;
    $offset = ($pagina - 1) * $limite;

    try {
        $stmt = $pdo->prepare(
            "SELECT acciones.idaccion, acciones.descripcion, aprendiz.nombres, aprendiz.apellidos, 
                    acciones.fecha, acciones.usuario, acciones.idreporte
             FROM acciones
             INNER JOIN reportes ON acciones.idreporte = reportes.idreporte
             INNER JOIN aprendiz ON reportes.idaprendiz = aprendiz.idaprendiz
             WHERE reportes.idreporte = :idreporte
             LIMIT $offset, $limite"
        );
        $stmt->execute([':idreporte' => $idreporte]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error al listar acciones por reporte: " . $e->getMessage();
        return [];
    }
}
?>
