<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
include 'header.php';
include '../controller/Aprendices/Listar_Aprendices.php';
include '../controller/Aprendices/Modals.php';
?>
<div id="alerta"></div>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Aprendices</h1>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAprendizModal">Añadir Aprendiz</button>
    </div>
    <table class="table table-striped border-black" style="border: 2px solid black;">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Tipo de documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $aprendices = listarAprendices();
            foreach ($aprendices as $aprendiz): ?>
                <tr>
                    <td><?php echo $aprendiz['idaprendiz']; ?></td>
                    <td><?php echo $aprendiz['tipodoc']; ?></td>
                    <td><?php echo $aprendiz['nombres']; ?></td>
                    <td><?php echo $aprendiz['apellidos']; ?></td>
                    <td><?php echo $aprendiz['celular']; ?></td>
                    <td><?php echo $aprendiz['email']; ?></td>
                    <td><?php echo $aprendiz['direccion']; ?></td>
                    <td>
                        <a href="../controller/Aprendices/Eliminar_Aprendices.php?id=<?php echo $aprendiz['idaprendiz']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este aprendiz?');">Eliminar</a>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAprendizModal" onclick="CargarDatos('<?php echo $aprendiz['idaprendiz']; ?>', '<?php echo htmlspecialchars($aprendiz['tipodoc']); ?>', '<?php echo htmlspecialchars($aprendiz['nombres']); ?>', '<?php echo htmlspecialchars($aprendiz['apellidos']); ?>', '<?php echo htmlspecialchars($aprendiz['celular']); ?>', '<?php echo htmlspecialchars($aprendiz['email']); ?>', '<?php echo htmlspecialchars($aprendiz['direccion']); ?>')">Editar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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

