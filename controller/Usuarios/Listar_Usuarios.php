<?php
require '../config.php';

function listarUsuarios() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE nombre_usuario LIKE :busqueda OR email_usuario LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM usuario");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
