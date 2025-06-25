<?php
include 'header.php';
include '../controller/Reportes/Listar_Reportes.php';

$reportes = listarReportes($pagina, $limite);
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
        <?php include 'funciones/busquedas.php'; ?>
        <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
            <a href="/Trabajo-sena/views/Nuevo_Reporte.php" class="btn w-100" style="background-color: #50c8c6; color: #fff;">
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
                    <td class="text-center">
                        <div class="dropdown">
                          <button class="btn btn-primary btn-sm" type="button" id="dropdownMenuButton<?php echo $reporte['idreporte']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-sort"></i>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $reporte['idreporte']; ?>">
                            <li>
                              <a class="dropdown-item text-warning" href="/Trabajo-sena/views/editar_reporte.php?idreporte=<?php echo $reporte['idreporte']; ?>">
                                <i class="fas fa-edit"></i> Editar
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item text-danger" href="/Trabajo-sena/controller/Reportes/Eliminar_Reportes.php?idreporte=<?php echo $reporte['idreporte']; ?>" onclick="return confirm('¿Está seguro de eliminar este reporte?');">
                                <i class="fas fa-trash"></i> Eliminar
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item text-info" href="/Trabajo-sena/views/acciones_reportes.php?idreporte=<?php echo $reporte['idreporte']; ?>">
                                <i class="fas fa-eye"></i> Accion
                              </a>
                            </li>
                          </ul>
                        </div>
                    </td>

                </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php include 'funciones/paginacion.php'; ?>
        </div>
    </div>
</div>
<div class="floating-button mb-5" style="position: fixed; bottom: 40px; right: 20px;">
        <button class="btn btn-danger rounded-circle" style="width: 60px; height: 60px;" onclick="document.getElementById('export-options').style.display = document.getElementById('export-options').style.display === 'none' ? 'block' : 'none';" title="Exportar Reporte">
            <i class="fa-solid fa-file"></i>
        </button>
        <div id="export-options" style="display: none; position: absolute; bottom: 70px; right: 0;">
            <button class="btn btn-primary rounded-circle mb-2" style="width: 60px; height: 60px;" onclick="location.href='../controller/Reportes/Exportar_Reportes.php?tipo=pdf'">
                <i class="fa-solid fa-file-pdf"></i>
            </button>
            <button class="btn btn-success rounded-circle" style="width: 60px; height: 60px;" onclick="location.href='../controller/Reportes/Exportar_Reportes.php?tipo=excel'">
                <i class="fa-solid fa-file-excel"></i>
            </button>
        </div>
    </div>
</body>
<script>
    <?php include 'funciones/Alertas.php'; ?>
</script>
</html>
<?php include 'footer.php'; ?>

