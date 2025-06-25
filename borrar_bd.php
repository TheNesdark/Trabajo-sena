<?php
require_once 'config.php'; // Debe definir $pdo como instancia de PDO

// Obtener todas las tablas de la base de datos actual
$tablas = [];
$stmt = $pdo->query("SHOW FULL TABLES WHERE Table_type = 'BASE TABLE'");
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $tablas[] = $row[0];
}

// Desactivar restricciones de clave foránea
$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");

// Eliminar todas las tablas
foreach ($tablas as $tabla) {
    $pdo->exec("DROP TABLE IF EXISTS `$tabla`");
}

// Reactivar restricciones de clave foránea
$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

echo "Todas las tablas han sido eliminadas correctamente.";
?>