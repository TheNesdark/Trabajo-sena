<?php
require '../config.php';

function listarAcciones($pagina, $limite) {
    global $pdo;

    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    try {
        if ($busqueda !== '') {
            $sql = "SELECT aprendiz.nombres, aprendiz.apellidos, 
                           reportes.idreporte, acciones.descripcion, acciones.idaccion
                    FROM aprendiz
                    INNER JOIN reportes ON aprendiz.idaprendiz = reportes.idaprendiz
                    INNER JOIN acciones ON reportes.idreporte = acciones.idreporte
                    WHERE acciones.idreporte LIKE :busqueda 
                       OR acciones.descripcion LIKE :busqueda 
                       OR acciones.usuario LIKE :busqueda
                    LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
        } else {
            $sql = "SELECT aprendiz.nombres, aprendiz.apellidos, 
                           reportes.idreporte, acciones.descripcion, acciones.idaccion
                    FROM aprendiz
                    INNER JOIN reportes ON aprendiz.idaprendiz = reportes.idaprendiz
                    INNER JOIN acciones ON reportes.idreporte = acciones.idreporte
                    LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        error_log('Error en listarAcciones: ' . $e->getMessage());
        return [];
    }
}


