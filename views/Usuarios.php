
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <?php 
    include 'header.php';
    include '../controller/Usuarios/Listar_Usuarios.php';
    include '../controller/Usuarios/Modals.php';
    ?>
    <div id="alerta">

    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Usuarios</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Añadir Usuario</button>
        </div>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <thead>
                <tr>
                    <th style="width: 20%;">Usuario</th>
                    <th style="width: 30%;">Nombre</th>
                    <th style="width: 30%;">Email</th>
                    <th style="width: 20%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $usuarios = listarUsuarios();
                foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['usuario']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td>
                            <a href="../controller/Usuarios/Eliminar_Usuarios.php?usuario=<?php echo $usuario['usuario']; ?>" class="btn btn-primary">Eliminar</a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUserModal" onclick="CargarDatos('<?php echo $usuario['usuario']; ?>', '<?php echo $usuario['nombre']; ?>', '<?php echo $usuario['email']; ?>')">Editar</button>
                        </td>
                    </tr>  
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<script>
<?php 
    include 'Alertas.php';
?>

function CargarDatos(usuario, nombre, email) {
        document.getElementById('editUsuario').value = usuario;
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editEmail').value = email;
}

function verificarUsuarioExistente() {
    const usuario = document.getElementById('usuario').value;
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = '';

    let estado = false;

    <?php

    $usuariosExistentes = listarUsuarios();
    foreach ($usuariosExistentes as $usuarioExistente): ?>
        if (usuario === '<?php echo $usuarioExistente['usuario']; ?>') {
            alertContainer.innerHTML = '<div class="alert alert-danger">El usuario ya existe. Por favor, elige otro.</div>';
            estado = true;
        }
    <?php endforeach; ?>

    if (estado) {
        return false;
    } else {
        return true;
    }
}

</script>
<?php include 'footer.php'; ?>
</body>
</html>