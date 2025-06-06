
<?php
include '../config.php';
include '../controller/consultas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Motivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
     <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Motivos</h1>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">nuevo motivo</button>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $motivos = listar("motivo");
                    foreach ($motivos as $motivo): ?>
                <tr>
                    <td><?php echo $motivo['idmotivo']; ?></td>
                    <td><?php echo $motivo['descripcion']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $motivo['idmotivo']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?php echo $motivo['idmotivo']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>






    <!-- Botón para abrir el modal -->




</body>
</html>
