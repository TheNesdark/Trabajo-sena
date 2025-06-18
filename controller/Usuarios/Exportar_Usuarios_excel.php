<?php
include('../../config.php');


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=usuarios.xls");
header("Pragma: no-cache");
header("Expires: 0");


$usuarios = $pdo->query("SELECT * FROM usuarios");
$datos = $usuarios->fetchAll(PDO::FETCH_ASSOC);


echo "<table border='1'>";
echo "<tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Email</th>
      </tr>";

foreach ($datos as $usuario) {
    echo "<tr>";
    echo "<td>" . utf8_decode($usuario['usuario']) . "</td>";
    echo "<td>" . utf8_decode($usuario['nombre']) . "</td>";
    echo "<td>" . utf8_decode($usuario['email']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
