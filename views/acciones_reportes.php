<?php 
include 'header.php'; 
include '../controller/Acciones/Modals.php';
include '../controller/Acciones/Listar_Acciones.php';
$idreporte = $_GET['idreporte'];
        $stmt = $pdo->prepare("
            SELECT 
                reportes.idreporte,
                aprendiz.nombres AS nombre_aprendiz,
                aprendiz.apellidos AS apellido_aprendiz,
                ficha.nficha,
                programa.nombreprograma,
                motivo.descripcion AS motivo,
                reportes.fallas,
                reportes.observaciones,
                reportes.estado,
                reportes.fecha
            FROM reportes
            INNER JOIN aprendiz ON reportes.idaprendiz = aprendiz.idaprendiz
            INNER JOIN ficha ON reportes.nficha = ficha.nficha
            INNER JOIN programa ON ficha.idprograma = programa.idprograma
            INNER JOIN motivo ON reportes.idmotivo = motivo.idmotivo
            WHERE reportes.idreporte = ?
        ");
        $stmt->execute([$idreporte]);
        $reporte = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombre_usuario = $reporte['nombre_aprendiz'] . ' ' . $reporte['apellido_aprendiz'];

$acciones = listarAccionesPorReporte($idreporte);
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
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
        <div class="col-md-9 col-12 mb-2 mb-md-0">
    <form class="d-flex w-100" method="GET">
        <input type="hidden" name="idreporte" value="<?php echo htmlspecialchars($_GET['idreporte'] ?? ''); ?>">
        <input class="form-control me-2" type="search" name="busqueda" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
        <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
            <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addAccionModal">
                <i class="fa-solid fa-plus"></i> Añadir Accion a <?php echo $nombre_usuario; ?>
            </button>
        </div>
    </div>
        <div class="table-container" style="max-width: 98%; margin:auto;">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class='text-center w-20'><i class="fa-solid fa-hashtag"></i> ID Reporte</th>
                            <th class='text-center w-20'><i class="fa-solid fa-user"></i> Aprendiz</th>
                            <th class='text-center w-20'><i class="fa-solid fa-align-left"></i> Descripción</th>
                            <th class='text-center w-20'><i class="fa-solid fa-cog"></i> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($acciones as $accion): ?>
                        <tr>
                            <td class='text-center'><?php echo $accion['idreporte']; ?></td>
                            <td class='text-center'><?php echo $accion['nombres'] . ' ' . $accion['apellidos']; ?></td>
                            <td class='text-center'><?php echo $accion['descripcion']; ?></td>
                            <td class='text-center'>
                                <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editAccionModal" onclick="CargarDatos(<?php echo $accion['idaccion']; ?>, '<?php echo htmlspecialchars($accion['descripcion']); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="../controller/Acciones/Eliminar_Acciones.php?id=<?php echo $accion['idaccion']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta acción?')">
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

<script>
<?php include 'Alertas.php'; ?>
    function CargarDatos(id, descripcion) {
        document.getElementById('editIdAccion').value = id;
        document.getElementById('editDescripcion').value = descripcion;
    }
</script>
</body>
</html>
<?php include 'footer.php'; ?>