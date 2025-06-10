
<?php require '../controller/Motivos/Listar_Motivos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Motivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; 
        include '../controller/Motivos/Modals.php';
    ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Motivos</h1>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMotivoModal">nuevo motivo</button>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $motivos = listarMotivos();
                    foreach ($motivos as $motivo): ?>
                <tr>
                    <td><?php echo $motivo['idmotivo']; ?></td>
                    <td><?php echo $motivo['descripcion']; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#editMotivoModal" onclick="cargarDatos(<?php echo $motivo['idmotivo']; ?>, '<?php echo $motivo['descripcion']; ?>')">Editar</button>
                        <a href="../controller/Motivos/Eliminar_Motivos.php?id=<?php echo $motivo['idmotivo']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta acción?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <script>

        include 'Alertas.php';
            function cargarDatos(idmotivo, descripcion) {
                document.getElementById('editIdMotivo').value = idmotivo;
                document.getElementById('editDescripcion').value = descripcion;
            }
        </script>

</body>
</html>
