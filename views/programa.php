<?php

include '../controller/Programa/Listar_Programa.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php 
        include 'header.php'; 
        include '../controller/Programa/Modals.php';
    ?>
    <div id="alerta"></div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Programas</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProgramaModal">Añadir Programa</button>
        </div>

        <table class="table table-striped border-black" style="border: 2px solid black;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $programas = listarProgramas();
                    foreach ($programas as $programa): ?>
                <tr>
                    <td><?php echo $programa['idprograma']; ?></td>
                    <td><?php echo $programa['nombreprograma']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProgramaModal" onclick="CargarDatos(<?php echo $programa['idprograma']; ?>, '<?php echo htmlspecialchars($programa['nombreprograma']); ?>')">Editar</button>
                        <a href="../controller/Programa/Eliminar_Programa.php?id=<?php echo $programa['idprograma']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este programa?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<script>
<?php include 'Alertas.php'; ?>
    function CargarDatos(id, nombre) {
        document.getElementById('editIdPrograma').value = id;
        document.getElementById('editNombre').value = nombre;
    }

    function ComprobarFichas(){

    }
</script>
<?php include 'footer.php'; ?>
</body>
</html>