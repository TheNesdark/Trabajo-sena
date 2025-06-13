<?php
require '../config.php';

function listarAcciones() {
    global $pdo;
    $busqueda = '';
    try {
        if (isset($_GET['busqueda'])) {
            $busqueda = $_GET['busqueda'];
            $stmt = $pdo->prepare("SELECT * FROM acciones WHERE idaccion LIKE :busqueda OR descripcion LIKE :busqueda OR usuario LIKE :busqueda");
            $stmt->execute([':busqueda' => "%$busqueda%"]);
        } else {
            $stmt = $pdo->query("SELECT aprendiz.nombres, aprendiz.apellidos, 
       reportes.idreporte, acciones.descripcion,acciones.idaccion
FROM aprendiz
INNER JOIN reportes ON aprendiz.idaprendiz = reportes.idaprendiz
INNER JOIN acciones ON reportes.idreporte = acciones.idreporte");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Error in listarAcciones: ' . $e->getMessage());
        return [];
    }
}

function listarAccionesPorReporte($idreporte) {
    global $pdo;
    $busqueda = '';
    try {
        if (isset($_GET['busqueda'])) {
            $busqueda = $_GET['busqueda'];
            $stmt = $pdo->prepare("SELECT * FROM acciones WHERE idreporte = :idreporte AND (idaccion LIKE :busqueda OR descripcion LIKE :busqueda OR usuario LIKE :busqueda)");
            $stmt->execute([':idreporte' => $idreporte, ':busqueda' => "%$busqueda%"]);
        } else {
            $stmt = $pdo->prepare("SELECT aprendiz.nombres, aprendiz.apellidos, 
            reportes.idreporte, acciones.descripcion, acciones.idaccion
     FROM aprendiz
     INNER JOIN reportes ON aprendiz.idaprendiz = reportes.idaprendiz
     INNER JOIN acciones ON reportes.idreporte = acciones.idreporte
     WHERE acciones.idreporte = :idreporte");
            $stmt->execute([':idreporte' => $idreporte]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Error in listarAccionesPorReporte: ' . $e->getMessage());
        return [];
    }
}

