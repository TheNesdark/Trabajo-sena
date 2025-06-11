<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include '../config.php';
include '../controller/Reportes/Listar_Reportes.php';
include 'header.php';
?>
<div class="container mt-5">
        <h1 class="text-center mb-4">Lista de reportes</h1>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <thead>
            <tr>
                <th>ID Reporte</th>
                <th>Aprendiz</th>
                <th>N° Ficha</th>
                <th>Programa</th>
                <th>Motivo</th>
                <th>Fallas</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Fecha Reporte</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $reportes = listarReportes();
                foreach ($reportes as $reporte): ?>
            <tr>
                <td><?php echo $reporte['idreporte']; ?></td>
                <td><?php echo $reporte['nombre_aprendiz'] . ' ' . $reporte['apellido_aprendiz']; ?></td>
                <td><?php echo $reporte['nficha']; ?></td>
                <td><?php echo $reporte['nombreprograma']; ?></td>
                <td><?php echo $reporte['motivo']; ?></td>
                <td><?php echo $reporte['fallas']; ?></td>
                <td><?php echo $reporte['observaciones']; ?></td>
                <td><?php echo $reporte['estado']; ?></td>
                <td><?php echo $reporte['fecha']; ?></td>
                <td>
                <a href="/Trabajo-sena/views/reportes/editar_reporte.php?id=<?php echo $reporte['idreporte']; ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="/Trabajo-sena/controller/eliminar.php?id=<?php echo $reporte['idreporte']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este reporte?');">Eliminar</a>
                </td>
            </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
<?php include 'footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>

