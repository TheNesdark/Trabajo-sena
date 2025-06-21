<?php 
include 'header.php'; 
include '../controller/Acciones/Modals.php';
include '../controller/Acciones/Listar_Acciones.php';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
$acciones = listarAcciones($pagina, $limite);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Acciones</title>
</head>
<body>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-bolt" style="color: #50c8c6"></i> Lista de Acciones </h1>
        </div>
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
        <?php include 'busquedas.php'; ?>
    </div>
        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class='text-center w-20'><i class="fa-solid fa-hashtag"></i> ID Reporte</th>
                            <th class='text-center w-20'><i class="fa-solid fa-user"></i> Aprendiz</th>
                            <th class='text-center w-20'><i class="fa-solid fa-align-left"></i> Descripción</th>
                            <th class='text-center w-20'><i class="fa-solid fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            foreach ($acciones as $accion): ?>
                        <tr>
                            <td class='text-center'><?php echo $accion['idreporte']; ?></td>
                            <td class='text-center'><?php echo $accion['nombres'] . ' ' . $accion['apellidos']; ?></td>
                            <td class='text-center'><?php echo $accion['descripcion']; ?></td>
                            <td class='text-center'>
                                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editAccionModal" onclick="CargarDatos(<?php echo $accion['idaccion']; ?>, '<?php echo htmlspecialchars($accion['descripcion']); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="../controller/Acciones/Eliminar_Acciones.php?id=<?php echo $accion['idaccion']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta acción?')">
                                    <i class="fas fa-trash"></i>
                                </a>
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
                                            
                  <li class="page-item <?= (count($acciones) < $limite) ? 'disabled' : '' ?>">
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
            <button class="btn btn-primary rounded-circle mb-2" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_acciones.php?tipo=pdf'">
                <i class="fa-solid fa-file-pdf"></i>
            </button>
            <button class="btn btn-success rounded-circle" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_acciones.php?tipo=excel'">
                <i class="fa-solid fa-file-excel"></i>
            </button>
        </div>
    </div>

<script>
<?php include 'Alertas.php'; ?>
    function CargarDatos(id, descripcion) {
        document.getElementById('editIdAccion').value = id;
        document.getElementById('editDescripcion').value = descripcion;
    }
</script>
</body>
</html>
<?php include 'footer.php'; ?>