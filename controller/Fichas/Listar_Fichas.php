
<?php
require '../config.php';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
function listarFichas($pagina, $limite) {
    global $pdo;
    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    try {
        if ($busqueda !== '') {;
            $stmt = $pdo->prepare("SELECT programa.nombreprograma, ficha.nficha 
                    FROM ficha 
                    INNER JOIN programa ON ficha.idprograma = programa.idprograma 
                    WHERE programa.nombreprograma LIKE :busqueda 
                       OR ficha.nficha LIKE :busqueda
                    LIMIT $offset, $limite");
            $stmt->execute([':busqueda' => '%' . $busqueda . '%']);
        } else {;
            $stmt = $pdo->prepare("SELECT programa.nombreprograma, ficha.nficha 
                    FROM ficha 
                    INNER JOIN programa ON ficha.idprograma = programa.idprograma 
                    LIMIT $offset, $limite");
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        error_log('Error en listarFichas: ' . $e->getMessage());
        return [];
    }
}
?>


