
<?php
require '../config.php';

function listarFichas($pagina, $limite) {
    global $pdo;

    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    try {
        if ($busqueda !== '') {
            $sql = "SELECT programa.nombreprograma, ficha.nficha 
                    FROM ficha 
                    INNER JOIN programa ON ficha.idprograma = programa.idprograma 
                    WHERE programa.nombreprograma LIKE :busqueda 
                       OR ficha.nficha LIKE :busqueda 
                    LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
        } else {
            $sql = "SELECT programa.nombreprograma, ficha.nficha 
                    FROM ficha 
                    INNER JOIN programa ON ficha.idprograma = programa.idprograma 
                    LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        error_log('Error en listarFichas: ' . $e->getMessage());
        return [];
    }
}
?>


