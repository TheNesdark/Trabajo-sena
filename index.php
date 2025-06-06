
<?php
include 'config.php';
include 'controller/consultas.php';
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'views/header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Sistema de Deserción</h1>
    <p class="text-center">Utilice el menú de navegación para acceder a las diferentes secciones del sistema.</p>
</div>
<div class="container mt-5">
        <h1 class="text-center mb-4">Lista de reportes</h1>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <thead>
                <tr>
                    <th>nombres</th>
                    <th>apellidos</th>
                    <th>fallas</th>
                    <th>Nficha</th>
                    <th>fecha</th>
                    <th>estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $reportes = listarReportes();
                    foreach ($reportes as $reporte): ?>
                <tr>
                    <td><?php echo $reporte['nombres']; ?></td>
                    <td><?php echo $reporte['apellidos']; ?></td>
                    <td><?php echo $reporte['fallas']; ?></td>
                    <td><?php echo $reporte['nficha']; ?></td>
                    <td><?php echo $reporte['fecha']; ?></td>
                    <td><?php echo $reporte['estado']; ?></td>

                    <td>
                        <a href="/Trabajo-sena/views/reportes/editar_reporte.php?id=<?php echo $reporte['idreporte']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/Trabajo-sena/controller/eliminar.php?id=<?php echo $reporte['idreporte']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este reporte?');">Eliminar</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>