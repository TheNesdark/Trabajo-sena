<?php 
include 'header.php'; 
include '../controller/Acciones/Modals.php';
include '../controller/Acciones/Listar_Acciones.php';

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
$acciones = listarAcciones($pagina, $limite);
$totalAcciones = count(listarAcciones(1, PHP_INT_MAX));
$TotalPaginas = ceil($totalAcciones / $limite);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Acciones</title>
</head>
<body>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-bolt" style="color: #50c8c6"></i> Lista de Acciones </h1>
        </div>
    <div class="row mb-2" style="max-width: 98%; margin:auto; align-items: center;">
        <div class="col d-flex align-items-center">
            <?php include 'funciones/busquedas.php'; ?>
            <div class="floating-button ms-3" style="position: relative;">
                <button class="btn btn-danger rounded-circle" style="width: 40px; height: 40px;" onclick="document.getElementById('export-options').style.display = document.getElementById('export-options').style.display === 'none' ? 'block' : 'none';" title="Exportar Reporte Acciones">
                    <i class="fa-solid fa-file"></i>
                </button>
                <div id="export-options" class="btn-group-vertical flex-column-reverse"
                     style="display: none; position: absolute; bottom: 50px; right: 0; z-index: 10; flex-direction: column-reverse;">
                    <button class="btn btn-primary rounded-circle mb-2" style="width: 40px; height: 40px; display: block;" onclick="window.location.href='../controller/Acciones/Exportar_acciones.php?tipo=pdf'">
                        <i class="fa-solid fa-file-pdf"></i>
                    </button>
                    <button class="btn btn-success rounded-circle" style="width: 40px; height: 40px; display: block;" onclick="window.location.href='../controller/Acciones/Exportar_acciones.php?tipo=excel'">
                        <i class="fa-solid fa-file-excel"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class='text-center w-20'><i class="fa-solid fa-hashtag"></i> ID Accion</th>
                            <th class='text-center w-20'><i class="fa-solid fa-align-left"></i> Descripción</th>
                            <th class='text-center w-20'><i class="fa-solid fa-clock"></i> Aprendiz</th>
                            <th class='text-center w-20'><i class="fa-solid fa-calendar"></i> Fecha</th>
                            <th class='text-center w-20'><i class="fa-solid fa-user"></i> Usuario</th>
                            <th class='text-center w-20'><i class="fa-solid fa-cog"></i> ID Reporte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($acciones as $accion): ?>
                        <tr>
                            <td class='text-center'><?php echo $accion['idaccion']; ?></td>
                            <td class='text-center'><?php echo $accion['descripcion']; ?></td>
                            <td class='text-center'><?php echo $accion['nombres'] . ' ' . $accion['apellidos']; ?></td>
                            <td class='text-center'><?php echo $accion['fecha']; ?></td>
                            <td class='text-center'><?php echo $accion['usuario']; ?></td>
                            <td class='text-center'><?php echo $accion['idreporte']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php include 'funciones/paginacion.php'; ?>
        </div>
    </div>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>
