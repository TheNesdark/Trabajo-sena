
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="/trabajo-sena/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <?php 
        include 'header.php'; 
        include '../controller/Acciones/Modals.php';
        include '../controller/Acciones/Listar_Acciones.php';
    ?>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-bolt" style="color: #50c8c6"></i> Lista de Acciones</h1>
        </div>
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <?php include 'busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addAccionModal">
                    <i class="fa-solid fa-plus"></i> Añadir Acción
                </button>
            </div>
        </div>
        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class='text-center w-20'><i class="fa-solid fa-hashtag"></i> ID</th>
                            <th class='text-center w-20'><i class="fa-solid fa-align-left"></i> Descripción</th>
                            <th class='text-center w-20'><i class="fa-solid fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $acciones = listarAcciones();
                            foreach ($acciones as $accion): ?>
                        <tr>
                            <td class='text-center'><?php echo $accion['idaccion']; ?></td>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
<?php include 'Alertas.php'; ?>
    function CargarDatos(id, descripcion) {
        document.getElementById('editIdAccion').value = id;
        document.getElementById('editDescripcion').value = descripcion;
    }
</script>
<?php include 'footer.php'; ?>
</body>
</html>