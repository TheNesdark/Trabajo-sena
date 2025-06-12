<?php

require '../config.php';

function listarProgramas() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM programa WHERE idprograma LIKE :busqueda OR nombreprograma LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM programa");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
