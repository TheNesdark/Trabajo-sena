
<?php
require '../config.php';

function listarFichas() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM ficha WHERE nombre_ficha LIKE :busqueda OR codigo_ficha LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM ficha");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

