<?php
require '../config.php';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
function listarMotivos($pagina, $limite) {
    global $pdo;
    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;
    try {
        if ($busqueda !== '') {
            $stmt = $pdo->prepare("SELECT * FROM motivo 
                    WHERE idmotivo LIKE :busqueda 
                       OR descripcion LIKE :busqueda 
                    LIMIT $offset, $limite");
            $stmt->execute([':busqueda' => '%' . $busqueda . '%']);
        } else {
            $stmt = $pdo->prepare("SELECT * FROM motivo 
                    LIMIT $offset, $limite");
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Error en listarMotivos: ' . $e->getMessage());
        return [];
    }
}
?>

