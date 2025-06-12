<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="/trabajo-sena/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <?php 
    include 'header.php';
    include '../controller/Usuarios/Listar_Usuarios.php';
    include '../controller/Usuarios/Modals.php';
    ?>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-users" style="color: #50c8c6"></i> Lista de Usuarios</h1>
        </div>
        <?php include 'busquedas.php'; ?>
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fa-solid fa-plus"></i> Añadir Usuario
                </button>
            </div>
        </div>
        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class='text-center w-20'><i class="fa-solid fa-user"></i> Usuario</th>
                            <th class='text-center w-20'><i class="fa-solid fa-id-badge"></i> Nombre</th>
                            <th class='text-center w-20'><i class="fa-solid fa-envelope"></i> Email</th>
                            <th class='text-center w-20'><i class="fa-solid fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $usuarios = listarUsuarios();
                        foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td class='text-center'><?php echo $usuario['usuario']; ?></td>
                                <td class='text-center'><?php echo $usuario['nombre']; ?></td>
                                <td class='text-center'><?php echo $usuario['email']; ?></td>
                                <td class='text-center'>
                                    <a href="../controller/Usuarios/Eliminar_Usuarios.php?usuario=<?php echo $usuario['usuario']; ?>" class="btn btn-danger btn-sm me-1" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal" onclick="CargarDatos('<?php echo $usuario['usuario']; ?>', '<?php echo $usuario['nombre']; ?>', '<?php echo $usuario['email']; ?>')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>  
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
<?php include 'Alertas.php'; ?>
function CargarDatos(usuario, nombre, email) {
    document.getElementById('editUsuario').value = usuario;
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editEmail').value = email;
}
</script>
<?php include 'footer.php'; ?>
</body>
</html>