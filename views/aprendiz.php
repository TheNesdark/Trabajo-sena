<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/trabajo-sena/assets/css/style.css" rel="stylesheet">
    
</head>
<body>
<?php
include 'header.php';
include '../controller/Aprendices/Modals.php';
include '../controller/Aprendices/Listar_Aprendices.php';
?>
<div id="alerta"></div>
<div class="container mt-4">
    
    <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
        <h1> <i class="fa-solid fa-graduation-cap" style="color: #50c8c6"></i> Lista de Aprendices</h1>
    </div>
    <div class="row mb-2" style="max-width: 98%; margin:auto;">
        <?php  ?>
        <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addAprendizModal">
                <i class="fa-solid fa-plus"></i> Añadir Aprendiz
            </button>
        </div>
    </div>
    <div class="table-container" style="max-width: 98%; margin:auto;">
        <div class="table-responsive">
    <table class="table table-bordered mb-0">
        <thead >
            <tr>
                <th class='text-center w-20'><i class="fa-solid fa-id-card-clip"></i> Documento</th>
                <th class='text-center w-20'> <i class="fa-solid fa-ellipsis-vertical"></i> Tipo de documento</th>
                <th class='text-center w-20'> <i class="fa-solid fa-pencil"></i> Nombre</th>
                <th class='text-center w-20'> <i class="fa-solid fa-pencil"></i> Apellido</th>
                <th class='text-center w-20'> <i class="fa-solid fa-phone"></i> Celular</th>
                <th class='text-center w-20'> <i class="fa-solid fa-envelope"></i> Correo</th>
                <th class='text-center w-20'> <i class="fa-solid fa-map-marker-alt"></i> Dirección</th>
                <th class='text-center w-20'> <i class="fa-solid fa-cog"></i> Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $aprendices = listarAprendices();
            foreach ($aprendices as $aprendiz): ?>
                <tr>
                    <td class='text-center'><?php echo $aprendiz['idaprendiz']; ?></td>
                    <td class='text-center'><?php echo $aprendiz['tipodoc']; ?></td>
                    <td class='text-center'><?php echo $aprendiz['nombres']; ?></td>
                    <td class='text-center'><?php echo $aprendiz['apellidos']; ?></td>
                    <td class='text-center'><?php echo $aprendiz['celular']; ?></td>
                    <td class='text-center'><?php echo $aprendiz['email']; ?></td>
                    <td class='text-center'><?php echo $aprendiz['direccion']; ?></td>
                    <td class='text-center'>
                        <a href="../controller/Aprendices/Eliminar_Aprendices.php?id=<?php echo $aprendiz['idaprendiz']; ?>" class='btn btn-danger btn-sm me-1' onclick="return confirm('¿Está seguro de eliminar este aprendiz?');">
                            
                            <i class='fas fa-trash'></i>
                        </a>
                        <button type="button" class='btn btn-warning btn-sm me-1' data-bs-toggle="modal" data-bs-target="#editAprendizModal" onclick="CargarDatos('<?php echo $aprendiz['idaprendiz']; ?>', '<?php echo htmlspecialchars($aprendiz['tipodoc']); ?>', '<?php echo htmlspecialchars($aprendiz['nombres']); ?>', '<?php echo htmlspecialchars($aprendiz['apellidos']); ?>', '<?php echo htmlspecialchars($aprendiz['celular']); ?>', '<?php echo htmlspecialchars($aprendiz['email']); ?>', '<?php echo htmlspecialchars($aprendiz['direccion']); ?>')">
                            <i class='fas fa-edit'></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
<?php include 'Alertas.php'; ?>
function CargarDatos(id, tipodoc, nombres, apellidos, celular, email, direccion) {
    document.getElementById('editIdAprendiz').value = id;
    document.getElementById('editTipodoc').value = tipodoc;
    document.getElementById('editNombres').value = nombres;
    document.getElementById('editApellidos').value = apellidos;
    document.getElementById('editCelular').value = celular;
    document.getElementById('editEmail').value = email;
    document.getElementById('editDireccion').value = direccion;
}
</script>
<?php include 'footer.php'; ?>
</body>
</html>

