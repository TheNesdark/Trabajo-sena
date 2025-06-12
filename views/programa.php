<?php

include '../controller/Programa/Listar_Programa.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="/trabajo-sena/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <?php 
        include 'header.php'; 
        include '../controller/Programa/Modals.php';
    ?>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-book" style="color: #50c8c6"></i> Lista de Programas</h1>
        </div>
        
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <?php include 'busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addProgramaModal">
                    <i class="fa-solid fa-plus"></i> Añadir Programa
                </button>
            </div>
        </div>
        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class='text-center w-20'><i class="fa-solid fa-hashtag"></i> ID</th>
                            <th class='text-center w-20'><i class="fa-solid fa-book-open"></i> Nombre</th>
                            <th class='text-center w-20'><i class="fa-solid fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $programas = listarProgramas();
                        foreach ($programas as $programa): ?>
                        <tr>
                            <td class='text-center'><?php echo $programa['idprograma']; ?></td>
                            <td class='text-center'><?php echo $programa['nombreprograma']; ?></td>
                            <td class='text-center'>
                                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editProgramaModal" onclick="CargarDatos(<?php echo $programa['idprograma']; ?>, '<?php echo htmlspecialchars($programa['nombreprograma']); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="../controller/Programa/Eliminar_Programa.php?id=<?php echo $programa['idprograma']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este programa?')">
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
function CargarDatos(id, nombre) {
    document.getElementById('editIdPrograma').value = id;
    document.getElementById('editNombre').value = nombre;
}
</script>
<?php include 'footer.php'; ?>
</body>
</html>