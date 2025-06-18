<?php
require '../config.php';

function listarProgramas($pagina, $limite) {
    global $pdo;

    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    try {
        if ($busqueda !== '') {
            $sql = "SELECT * FROM programa 
                    WHERE idprograma LIKE :busqueda 
                       OR nombreprograma LIKE :busqueda 
                    LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
        } else {
            $sql = "SELECT * FROM programa 
                    LIMIT :offset, :limite";
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        error_log('Error en listarProgramas: ' . $e->getMessage());
        return [];
    }
}
?>

