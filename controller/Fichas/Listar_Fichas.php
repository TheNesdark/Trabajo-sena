
<?php
require '../config.php';

function listarFichas() {
    global $pdo;
    $busqueda = '';
    if (isset($_GET['busqueda']) && $_GET['busqueda'] !== "") {
        $busqueda = $_GET['busqueda'];
        $stmt = $pdo->prepare("SELECT programa.nombreprograma, ficha.nficha FROM ficha INNER JOIN programa ON ficha.idprograma = programa.idprograma WHERE programa.nombreprograma LIKE :busqueda OR ficha.nficha LIKE :busqueda");
        $stmt->execute([':busqueda' => "%$busqueda%"]);
    } else {
        $stmt = $pdo->query("SELECT programa.nombreprograma, ficha.nficha FROM ficha INNER JOIN programa ON ficha.idprograma = programa.idprograma");
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

