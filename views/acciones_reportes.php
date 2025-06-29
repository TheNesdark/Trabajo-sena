<?php 
include 'header.php'; 
include '../controller/Acciones/Modals.php';
include '../controller/Acciones/Listar_Acciones.php';

// Validar que idreporte esté definido y sea numérico
if (!isset($_GET['idreporte']) || !is_numeric($_GET['idreporte'])) {
    echo "<div class='alert alert-danger text-center mt-4'>ID de reporte no válido</div>";
    include 'footer.php';
    exit;
}

$idreporte = (int) $_GET['idreporte'];
$pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
$acciones = ListarAccionesReportes($idreporte, $pagina, $limite);
$totalAcciones = count(ListarAccionesReportes($idreporte, 1, PHP_INT_MAX));
$TotalPaginas = ceil($totalAcciones / $limite);


$aprendiz = (!empty($acciones) && isset($acciones[0]['nombres'], $acciones[0]['apellidos']))
    ? $acciones[0]['nombres'] . ' ' . $acciones[0]['apellidos']
    : 'Aprendiz';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Acciones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-bolt" style="color: #50c8c6"></i> Lista de Acciones</h1>
        </div>

        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <?php include 'funciones/busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addAccionModal">
                    <i class="fa-solid fa-plus"></i> Añadir Acción a <?php echo htmlspecialchars($aprendiz); ?>
                </button>
            </div>
        </div>

        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa-solid fa-hashtag"></i> ID Acción</th>
                            <th class="text-center"><i class="fa-solid fa-align-left"></i> Descripción</th>
                            <th class="text-center"><i class="fa-solid fa-calendar"></i> Fecha</th>
                            <th class="text-center"><i class="fa-solid fa-user"></i> Usuario</th>
                            <th class="text-center"><i class="fa-solid fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($acciones)) : ?>
                            <?php foreach ($acciones as $accion): ?>
                            <tr>
                                <td class="text-center"><?php echo $accion['idaccion']; ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($accion['descripcion']); ?></td>
                                <td class="text-center"><?php echo $accion['fecha']; ?></td>
                                <td class="text-center"><?php echo $accion['usuario']; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editAccionModal" onclick="CargarDatos(<?php echo $accion['idaccion']; ?>, '<?php echo htmlspecialchars(addslashes($accion['descripcion'])); ?>')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="../controller/Acciones/Eliminar_Acciones.php?id=<?php echo $accion['idaccion']; ?>&idreporte=<?php echo $idreporte; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta acción?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No se encontraron acciones para este reporte.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <nav aria-label="Page navigation mb-5">
                <ul class="pagination justify-content-center mt-3">
                    <?php
                    $idreporteURL = '&idreporte=' . urlencode($idreporte);
                    $busquedaURL = (isset($_GET['busqueda']) && !empty($_GET['busqueda'])) ? '&busqueda=' . urlencode($_GET['busqueda']) : '';

                    echo '<li class="page-item ' . (($pagina == 1) ? 'disabled' : '') . '">
                            <a class="page-link" href="?pagina=1' . $busquedaURL . $idreporteURL . '">Comienzo</a>
                          </li>';

                    if ($pagina - 1 >= 1) {
                        echo '<li class="page-item">
                                <a class="page-link" href="?pagina=' . ($pagina - 1) . $busquedaURL . $idreporteURL . '">' . ($pagina - 1) . '</a>
                              </li>';
                    }

                    echo '<li class="page-item active"><span class="page-link">' . $pagina . '</span></li>';

                    if ($pagina + 1 <= $TotalPaginas) {
                        echo '<li class="page-item">
                                <a class="page-link" href="?pagina=' . ($pagina + 1) . $busquedaURL . $idreporteURL . '">' . ($pagina + 1) . '</a>
                              </li>';
                    }

                    echo '<li class="page-item ' . (($pagina == $TotalPaginas) ? 'disabled' : '') . '">
                            <a class="page-link" href="?pagina=' . $TotalPaginas . $busquedaURL . $idreporteURL . '">Final</a>
                          </li>';
                    ?>
                </ul>
            </nav>

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

