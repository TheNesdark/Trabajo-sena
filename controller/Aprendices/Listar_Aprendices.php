
<?php
require '../config.php';

function listarAprendices() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM aprendiz");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al consultar la tabla aprendiz: " . $e->getMessage());
    }
}
?>