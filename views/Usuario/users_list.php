<?php ; 
include '../../config.php';
include '../../controller/consultas.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Usuarios</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $usuarios = consultar("usuarios");
                    foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['usuario']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $usuario['usuario']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?php echo $usuario['usuario']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        <a href="modificar.php?id=<?php echo $usuario['usuario']; ?>" class="btn btn-info btn-sm">Modificar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>
</html>