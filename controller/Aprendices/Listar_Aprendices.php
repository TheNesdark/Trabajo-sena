<?php
require '../config.php';
$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

function listarAprendices($pagina, $limite) {
    global $pdo;
    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;

    if ($busqueda !== '') {
        $stmt = $pdo->prepare("SELECT * FROM aprendiz 
                WHERE nombres LIKE :busqueda 
                OR apellidos LIKE :busqueda 
                OR idaprendiz LIKE :busqueda
                OR tipodoc LIKE :busqueda
                OR celular LIKE :busqueda
                OR email LIKE :busqueda
                OR direccion LIKE :busqueda
                LIMIT $offset, $limite");
        $stmt->execute([':busqueda' => '%' . $busqueda . '%']);
 
    } else {
        $stmt = $pdo->prepare("SELECT * FROM aprendiz LIMIT $offset, $limite");
        $stmt->execute();
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ListarAprendizFicha($nficha) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM aprendiz WHERE nficha = ?");
    $stmt->execute([$nficha]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>



