<?php
require '../config.php';
$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
function listarProgramas($pagina, $limite) {
    global $pdo;

    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    try {
        if ($busqueda !== '') {
            $stmt = $pdo->prepare("SELECT * FROM programa 
                    WHERE idprograma LIKE :busqueda 
                       OR nombreprograma LIKE :busqueda 
                    LIMIT $offset, $limite");
            $stmt->execute([':busqueda' => '%' . $busqueda . '%']);
        } else {
            $stmt = $pdo->prepare("SELECT * FROM programa 
                    LIMIT $offset, $limite");
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        error_log('Error en listarProgramas: ' . $e->getMessage());
        return [];
    }
}
?>

