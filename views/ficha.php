<?php 
include 'header.php';
include '../controller/Fichas/Listar_Fichas.php';
include '../controller/Fichas/Modals.php';
$fichas = listarFichas($pagina, $limite);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas</title>
</head>
<body>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-list-ol" style="color: #50c8c6"></i> Lista de Fichas</h1>
        </div>
        
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <?php include 'funciones/busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addFichaModal">
                    <i class="fa-solid fa-plus"></i> Añadir Ficha
                </button>
            </div>
        </div>
        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class='text-center w-20'><i class="fa-solid fa-hashtag"></i> Número Ficha</th>
                            <th class='text-center w-20'><i class="fa-solid fa-book-open"></i> Programa</th>
                            <th class='text-center w-20'><i class="fa-solid fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($fichas as $ficha): ?>
                        <tr>
                            <td class='text-center'><?php echo $ficha['nficha']; ?></td>
                            <td class='text-center'><?php echo $ficha['nombreprograma']; ?></td>
                            <td class='text-center'>
                                <a href="../controller/Fichas/Eliminar_Fichas.php?id=<?php echo $ficha['nficha']; ?>" class="btn btn-danger btn-sm me-1" onclick="return confirm('¿Seguro que deseas eliminar esta ficha?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFichaModal" onclick="CargarDatos('<?php echo htmlspecialchars($ficha['nficha']); ?>', '<?php echo htmlspecialchars($ficha['nombreprograma']); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>  
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php include 'funciones/paginacion.php'; ?>
            </div>
        </div>
    </div>
    <div class="floating-button mb-5" style="position: fixed; bottom: 20px; right: 20px;">
        <button class="btn btn-danger rounded-circle" style="width: 60px; height: 60px;" onclick="document.getElementById('export-options').style.display = document.getElementById('export-options').style.display === 'none' ? 'block' : 'none';" title="Exportar Reporte Fichas">
            <i class="fa-solid fa-file"></i>
        </button>
        <div id="export-options" class="btn-group-vertical" style="display: none; position: absolute; bottom: 70px; right: 0;">
            <button class="btn btn-primary rounded-circle mb-2" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Fichas/Exportar_fichas.php?tipo=pdf'">
                <i class="fa-solid fa-file-pdf"></i>
            </button>
            <button class="btn btn-success rounded-circle" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Fichas/Exportar_fichas.php?tipo=excel'">
                <i class="fa-solid fa-file-excel"></i>
            </button>
        </div>
    </div>

<script>
<?php include 'funciones/Alertas.php'; ?>
function CargarDatos(id, programa) {
    document.getElementById('editNumero').value = id;
    document.getElementById('editPrograma').value = programa;
}
function verificarFichaExistente() {
    const numero = document.getElementById('numero').value.trim();
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = '';
    const fichas = <?php echo json_encode(ListarFichas(1, PHP_INT_MAX)); ?>;

    if (fichas.some(ficha => ficha.nficha === numero)) {
        alertContainer.innerHTML = '<div class="alert alert-danger">La ficha ya está registrada.</div>';
        return false;
    }

    return true;
}
</script>
</body>
</html>
<?php include 'footer.php'; ?>