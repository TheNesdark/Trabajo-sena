<?php
require '../config.php';

function listarAcciones() {
    global $pdo;
    $busqueda = '';
    try {
        if (!$pdo) {
            throw new Exception('Database connection not established.');
        }
        if (isset($_GET['busqueda'])) {
            $busqueda = $_GET['busqueda'];
            $stmt = $pdo->prepare("SELECT * FROM acciones WHERE idaccion LIKE :busqueda OR descripcion LIKE :busqueda OR usuario LIKE :busqueda");
            $stmt->execute([':busqueda' => "%$busqueda%"]);
        } else {
            $stmt = $pdo->query("SELECT * FROM acciones");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Error in listarAcciones: ' . $e->getMessage());
        return [];
    }
}

function listarAccionesPorReporte($idreporte) {
    global $pdo;
    try {
        if (!$pdo) {
            throw new Exception('Database connection not established.');
        }
        $stmt = $pdo->prepare("SELECT * FROM acciones WHERE idreporte = :idreporte");
        $stmt->execute([':idreporte' => $idreporte]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Error in listarAccionesPorUsuario: ' . $e->getMessage());
        return [];
    }
}
?>
