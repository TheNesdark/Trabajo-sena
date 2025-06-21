<?php
include 'header.php'; 
include '../controller/Programa/Modals.php';
include '../controller/Programa/Listar_Programa.php';
$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$programas = listarProgramas($pagina, $limite);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas</title>
</head>
<body>
    <div id="alerta"></div>
    <div class="container mt-4">
        <div class="mb-2 mt-4 mrb-4 d-flex justify-content-center">
            <h1><i class="fa-solid fa-book" style="color: #50c8c6"></i> Lista de Programas</h1>
        </div>
        
        <div class="row mb-2" style="max-width: 98%; margin:auto;">
            <?php include 'busquedas.php'; ?>
            <div class="col-md-3 col-12 d-flex justify-content-md-end justify-content-center">
                <button type="button" class="btn w-100" style="background-color: #50c8c6; color: #fff;" data-bs-toggle="modal" data-bs-target="#addProgramaModal">
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
            <nav aria-label="Page navigation">
  <ul class="pagination justify-content-center mt-3">
    <li class="page-item <?= ($pagina <= 1) ? 'disabled' : '' ?>">
      <a class="page-link" href="?pagina=<?= $pagina - 1 ?>&busqueda=<?= isset($_GET['busqueda']) ? urlencode($_GET['busqueda']) : '' ?>" tabindex="-1" aria-disabled="<?= ($pagina <= 1) ? 'true' : 'false' ?>">← Anterior</a>
    </li>

    <li class="page-item active" aria-current="page">
      <span class="page-link">
        <?= $pagina ?>
      </span>
    </li>

    <li class="page-item <?= (count($programas) < $limite) ? 'disabled' : '' ?>">
      <a class="page-link" href="?pagina=<?= $pagina + 1 ?>&busqueda=<?= isset($_GET['busqueda']) ? urlencode($_GET['busqueda']) : '' ?>">Siguiente →</a>
    </li>
  </ul>
</nav>
        </div>
    </div>
    <div class="floating-button" style="position: fixed; bottom: 20px; right: 20px;">
        <button class="btn btn-primary rounded-circle" style="width: 60px; height: 60px;" onclick="toggleOptions()">
            <i class="fa-solid fa-share"></i>
        </button>
        <div id="export-options" class="btn-group-vertical" style="display: none; position: absolute; bottom: 70px; right: 0;">
            <button class="btn btn-primary rounded-circle mb-2" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_programas.php?tipo=pdf'">
                <i class="fa-solid fa-file-pdf"></i>
            </button>
            <button class="btn btn-success rounded-circle" style="width: 60px; height: 60px; display: block;" onclick="window.location.href='../controller/Usuarios/Exportar_programas.php?tipo=excel'">
                <i class="fa-solid fa-file-excel"></i>
            </button>
        </div>
    </div>
<script>
<?php include 'Alertas.php'; ?>
function CargarDatos(id, nombre) {
    document.getElementById('editIdPrograma').value = id;
    document.getElementById('editNombre').value = nombre;
}
</script>
</body>
</html>
<?php include 'footer.php'; ?>