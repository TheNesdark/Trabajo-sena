<?php 
include 'header.php'; 
include '../controller/Acciones/Modals.php';
include '../controller/Acciones/Listar_Acciones.php';
$idreporte = $_GET['idreporte'];
$acciones = listarAccionesPorReporte($idreporte);
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
        <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
            <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addAccionModal">
                <i class="fa-solid fa-plus"></i> Añadir Accion a <?php echo $acciones[0]['nombres']; ?>
            </button>
        </div>
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