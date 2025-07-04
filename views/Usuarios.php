<?php
include 'header.php';
include '../controller/Usuarios/Listar_Usuarios.php';
include '../controller/Usuarios/Modals.php';

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
$usuarios = listarUsuarios($pagina, $limite);
$Totalusuarios = count(listarUsuarios(1, PHP_INT_MAX));
$TotalPaginas = ceil($Totalusuarios / $limite);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>

    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-users" style="color: #50c8c6"></i> Lista de Usuarios</h1>
        </div>
        
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <?php include 'funciones/busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fa-solid fa-plus"></i> Añadir Usuario
                </button>
                <div class="floating-button text-center" style="position: relative; margin-left: 2%">
                    <button class="btn btn-danger rounded-circle" style="width: 40px; height: 40px;" onclick="document.getElementById('export-options').style.display = document.getElementById('export-options').style.display === 'none' ? 'block' : 'none';" title="Exportar Reporte Usuarios">
                        <i class="fa-solid fa-file"></i>
                    </button>
                    <div id="export-options" class="btn-group-vertical" style="display: none; position: absolute; bottom: 90%; right: 0;">
                        <button class="btn btn-primary rounded-circle mb-2" style="width: 40px; height: 40px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_Usuarios.php?tipo=pdf'">
                            <i class="fa-solid fa-file-pdf"></i>
                        </button>
                        <button class="btn btn-success rounded-circle mb-2" style="width: 40px; height: 40px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_Usuarios.php?tipo=excel'">
                            <i class="fa-solid fa-file-excel"></i>
                        </button>
                    </div>
                </div>
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
                <?php include 'funciones/paginacion.php'; ?>
            </div>
        </div>
    </div>
<script>
<?php include 'funciones/Alertas.php'; ?>
function CargarDatos(usuario, nombre, email) {
    document.getElementById('editUsuario').value = usuario;
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editEmail').value = email;
}
function verificarUsuarioExistente() {
    const usuario = document.getElementById('usuario').value.trim();
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = '';
    const usuarios = <?php echo json_encode(listarUsuarios(1, PHP_INT_MAX)); ?>;
    if (usuarios.some(user => user.usuario === usuario)) {
        alertContainer.innerHTML = '<div class="alert alert-danger">El usuario ya existe. Por favor, elige otro.</div>';
        return false;
    }

    return true;
}
</script>
</body>
<?php include 'footer.php'; ?>
</html>
