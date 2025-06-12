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

<div class="col-md-9 col-12 mb-2 mb-md-0">
            <form class="d-flex w-100" method="GET">
                <input class="form-control me-2" type="search" name="busqueda" placeholder="Buscar Aprendiz" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>