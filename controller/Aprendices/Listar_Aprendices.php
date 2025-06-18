<?php
require '../config.php';

function listarAprendices($pagina = 1, $limite = 10) {
    global $pdo;

    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    if ($busqueda !== '') {
        $sql = "SELECT * FROM aprendiz 
                WHERE nombres LIKE :busqueda OR apellidos LIKE :busqueda OR idaprendiz LIKE :busqueda 
                LIMIT :offset, :limite";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':busqueda', "%$busqueda%", PDO::PARAM_STR);
    } else {
        $sql = "SELECT * FROM aprendiz LIMIT :offset, :limite";
        $stmt = $pdo->prepare($sql);
    }
    
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
