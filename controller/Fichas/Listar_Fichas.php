
<?php
require '../config.php';

function listarFichas() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT programa.nombreprograma, ficha.nficha FROM ficha INNER JOIN programa ON ficha.idprograma = programa.idprograma");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        header("Location: ../../views/ficha.php?mensaje=error");
        exit();
    }
}
?>
