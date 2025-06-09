
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include '../config.php';
include '../controller/consultas.php';
include 'header.php';
?>
<div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Aprendices</h1>
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
                    $Aprendices = listarAprendices();
                    foreach ($Aprendices as $aprendiz): ?>
                <tr>
                    <td><?php echo $aprendiz['nombres']; ?></td>
                    <td><?php echo $aprendiz['apellidos']; ?></td>
                    <td><?php echo $aprendiz['fallas']; ?></td>
                    <td><?php echo $aprendiz['nficha']; ?></td>
                    <td><?php echo $aprendiz['fecha']; ?></td>
                    <td><?php echo $aprendiz['estado']; ?></td>

                    <td>
                        <a href="/Trabajo-sena/views/Aprendices/editar_aprendiz.php?id=<?php echo $aprendiz['idaprendiz']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/Trabajo-sena/controller/eliminar.php?id=<?php echo $aprendiz['idaprendiz']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este aprendiz?');">Eliminar</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>

