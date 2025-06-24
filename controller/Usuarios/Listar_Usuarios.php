<?php
require '../config.php';
$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
function listarUsuarios($pagina, $limite) {
    global $pdo;
    $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
    $offset = ($pagina - 1) * $limite;
    try {
        if ($busqueda !== '') {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre LIKE ? LIMIT $offset, $limite");
            $stmt->execute(['%'.$busqueda.'%']);
        } else {
            $stmt = $pdo->prepare("SELECT * FROM usuarios LIMIT $offset, $limite");
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error al listar usuarios: " . $e->getMessage();
        return [];

    }
}

?>

