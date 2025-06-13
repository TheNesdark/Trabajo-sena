<?php
include 'header.php';
include '../controller/Reportes/Listar_Reportes.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
</head>
<body>
<div id="alerta"></div>
<div class="container-fluid mt-4 ">
    <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
        <h1><i class="fa-solid fa-file-alt" style="color: #50c8c6"></i> Lista de Reportes</h1>
    </div>
    
    <div class="row mb-2" style="max-width: 98%; margin:auto;">
        <?php include 'busquedas.php'; ?>
        <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
            <a href="/Trabajo-sena/views/crear_reporte.php" class="btn w-100" style="background-color: #50c8c6; color: #fff;">
                <i class="fa-solid fa-plus"></i> Añadir Reporte
            </a>
        </div>
    </div>
    <div class="table-container" style="max-width: 98%; margin:auto;">
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th class='text-center w-20'><i class="fa-solid fa-hashtag"></i> ID Reporte</th>
                        <th class='text-center w-20'><i class="fa-solid fa-user-graduate"></i> Aprendiz</th>
                        <th class='text-center w-20'><i class="fa-solid fa-list-ol"></i> N° Ficha</th>
                        <th class='text-center w-20'><i class="fa-solid fa-book-open"></i> Programa</th>
                        <th class='text-center w-20'><i class="fa-solid fa-circle-question"></i> Motivo</th>
                        <th class='text-center w-20'><i class="fa-solid fa-exclamation"></i> Fallas</th>
                        <th class='text-center w-20'><i class="fa-solid fa-eye"></i> Observaciones</th>
                        <th class='text-center w-20'><i class="fa-solid fa-toggle-on"></i> Estado</th>
                        <th class='text-center w-20'><i class="fa-solid fa-calendar"></i> Fecha Reporte</th>
                        <th class='text-center w-20'><i class="fa-solid fa-cog"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $reportes = listarReportes();
                    foreach ($reportes as $reporte): ?>
                <tr>
                    <td class='text-center'><?php echo $reporte['idreporte']; ?></td>
                    <td class='text-center'><?php echo $reporte['nombre_aprendiz'] . ' ' . $reporte['apellido_aprendiz']; ?></td>
                    <td class='text-center'><?php echo $reporte['nficha']; ?></td>
                    <td class='text-center'><?php echo $reporte['nombreprograma']; ?></td>
                    <td class='text-center'><?php echo $reporte['motivo']; ?></td>
                    <td class='text-center'><?php echo $reporte['fallas']; ?></td>
                    <td class='text-center'><?php echo $reporte['observaciones']; ?></td>
                    <td class='text-center'><?php echo $reporte['estado']; ?></td>
                    <td class='text-center'><?php echo $reporte['fecha']; ?></td>
                    <td class='text-center'>
                        <a href="/Trabajo-sena/views/editar_reporte.php?idreporte=<?php echo $reporte['idreporte']; ?>" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/Trabajo-sena/controller/Reportes/Eliminar_Reportes.php?idreporte=<?php echo $reporte['idreporte']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este reporte?');">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a href="/Trabajo-sena/views/acciones_reportes.php?idreporte=<?php echo $reporte['idreporte']; ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script>
    <?php include 'Alertas.php'; ?>
</script>
</html>
<?php include 'footer.php'; ?>

