<?php
require '../config.php';
function listarAprendices() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT * FROM aprendiz WHERE nombres LIKE :busqueda OR apellidos LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT * FROM aprendiz");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}
?>

<form action="" method="GET" class="row g-2 mb-4">
    <div class="col-auto">
        <input type="text" class="form-control" name="busqueda" placeholder="Buscar aprendices" value="<?php echo htmlspecialchars($busqueda); ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>