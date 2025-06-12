<?php
require '../config.php';
function listarAprendices() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM aprendiz WHERE nombres LIKE :busqueda OR apellidos LIKE :busqueda or idaprendiz LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM aprendiz");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
?>

