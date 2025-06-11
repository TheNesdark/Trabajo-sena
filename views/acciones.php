
<?php
include '../controller/Acciones/Listar_Acciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php 
        include 'header.php'; 
        include '../controller/Acciones/Modals.php';
    ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Acciones</h1>
        <div id="alerta"></div>
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addAccionModal">Nueva Acción</button>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $acciones = listarAcciones();
                    foreach ($acciones as $accion): ?>
                <tr>
                    <td><?php echo $accion['idaccion']; ?></td>
                    <td><?php echo $accion['descripcion']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAccionModal" onclick ="CargarDatos(<?php echo $accion['idaccion']; ?>, '<?php echo htmlspecialchars($accion['descripcion']); ?>')">Editar</button>
                        <a href="../controller/Acciones/Eliminar_Acciones.php?id=<?php echo $accion['idaccion']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta acción?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


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