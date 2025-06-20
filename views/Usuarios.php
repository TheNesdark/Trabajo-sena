<?php
include 'header.php';
include '../controller/Usuarios/Listar_Usuarios.php';
include '../controller/Usuarios/Modals.php';
$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$usuarios = listarUsuarios($pagina, $limite);

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
            <?php include 'busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addUserModal">
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
            <nav aria-label="Page navigation">
  <ul class="pagination justify-content-center mt-3">
    <li class="page-item <?= ($pagina <= 1) ? 'disabled' : '' ?>">
      <a class="page-link" href="?pagina=<?= $pagina - 1 ?>&busqueda=<?= isset($_GET['busqueda']) ? urlencode($_GET['busqueda']) : '' ?>" tabindex="-1" aria-disabled="<?= ($pagina <= 1) ? 'true' : 'false' ?>">← Anterior</a>
    </li>

    <li class="page-item active" aria-current="page">
      <span class="page-link">
        <?= $pagina ?>
      </span>
    </li>

    <li class="page-item <?= (count($usuarios) < $limite) ? 'disabled' : '' ?>">
      <a class="page-link" href="?pagina=<?= $pagina + 1 ?>&busqueda=<?= isset($_GET['busqueda']) ? urlencode($_GET['busqueda']) : '' ?>">Siguiente →</a>
    </li>
  </ul>
</nav>
        </div>
    </div>
    <div class="floating-button" style="position: fixed; bottom: 20px; right: 20px;">
        <button class="btn btn-primary rounded-circle" style="width: 60px; height: 60px;" onclick="toggleOptions()">
            <i class="fa-solid fa-share"></i>
        </button>
        <div id="export-options" class="btn-group-vertical" style="display: none; position: absolute; bottom: 70px; right: 0;">
            <button class="btn btn-primary rounded-circle mb-2" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_Usuarios.php?tipo=pdf'">
                <i class="fa-solid fa-file-pdf"></i>
            </button>
            <button class="btn btn-success rounded-circle" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_Usuarios.php?tipo=excel'">
                <i class="fa-solid fa-file-excel"></i>
            </button>
        </div>
    </div>

<script>
<?php include 'Alertas.php'; ?>
function toggleOptions() {
        const options = document.getElementById('export-options');
        options.style.display = options.style.display === 'none' ? 'block' : 'none';
    }

function CargarDatos(usuario, nombre, email) {
    document.getElementById('editUsuario').value = usuario;
    document.getElementById('editNombre').value = nombre;
    document.getElementById('editEmail').value = email;
}
</script>
</body>
</html>
<?php include 'footer.php'; ?>