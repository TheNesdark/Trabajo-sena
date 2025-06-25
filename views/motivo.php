<?php 
include 'header.php'; 
include '../controller/Motivos/Modals.php';
require '../controller/Motivos/Listar_Motivos.php';
$motivos = listarMotivos($pagina, $limite);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Motivos</title>
</head>
<body>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-circle-question" style="color: #50c8c6"></i> Lista de Motivos</h1>
        </div>
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <?php include 'funciones/busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addMotivoModal">
                    <i class="fa-solid fa-plus"></i> Añadir Motivo
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
                        foreach ($motivos as $motivo): ?>
                        <tr>
                            <td class='text-center'><?php echo $motivo['idmotivo']; ?></td>
                            <td class='text-center'><?php echo $motivo['descripcion']; ?></td>
                            <td class='text-center'>
                                <button type="button" class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editMotivoModal" onclick="cargarDatos(<?php echo $motivo['idmotivo']; ?>, '<?php echo htmlspecialchars($motivo['descripcion'], ENT_QUOTES, 'UTF-8'); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="../controller/Motivos/Eliminar_Motivos.php?id=<?php echo $motivo['idmotivo']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este motivo?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php include 'funciones/paginacion.php'; ?>
        </div>
    </div>
    <div class="floating-button mb-5" style="position: fixed; bottom: 40px; right: 20px;">
        <button class="btn btn-danger rounded-circle" style="width: 60px; height: 60px;" onclick="document.getElementById('export-options').style.display = document.getElementById('export-options').style.display === 'none' ? 'block' : 'none';" title="Exportar Reporte Motivos">
            <i class="fa-solid fa-file"></i>
        </button>
        <div id="export-options" class="btn-group-vertical" style="display: none; position: absolute; bottom: 70px; right: 0;">
            <button class="btn btn-primary rounded-circle mb-2" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/motivos/Exportar_motivos.php?tipo=pdf'">
                <i class="fa-solid fa-file-pdf"></i>
            </button>
            <button class="btn btn-success rounded-circle" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/motivos/Exportar_motivos.php?tipo=excel'">
                <i class="fa-solid fa-file-excel"></i>
            </button>
        </div>
    </div>
<script>
<?php include 'funciones/Alertas.php'; ?>
function cargarDatos(idmotivo, descripcion) {
    document.getElementById('editIdMotivo').value = idmotivo;
    document.getElementById('editDescripcion').value = descripcion;
}
</script>
</body>
</html>
<?php include 'footer.php'; ?>