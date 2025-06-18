<?php 
include 'header.php';
include '../controller/Fichas/Listar_Fichas.php';
include '../controller/Fichas/Modals.php';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 10;
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
            <?php include 'busquedas.php'; ?>
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
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFichaModal" onclick="CargarDatos(<?php echo $ficha['nficha']; ?>, '<?php echo htmlspecialchars($ficha['nficha']); ?>', '<?php echo htmlspecialchars($ficha['nombreprograma']); ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
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
                                            
                  <li class="page-item <?= (count($fichas) < $limite) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?pagina=<?= $pagina + 1 ?>&busqueda=<?= isset($_GET['busqueda']) ? urlencode($_GET['busqueda']) : '' ?>">Siguiente →</a>
                  </li>
                </ul>
            </nav>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
<?php include 'Alertas.php'; ?>
function CargarDatos(id, numero, idprograma) {
    document.getElementById('numero').value = id;
    document.getElementById('editIdPrograma').value = idprograma;
}
</script>
</body>
</html>
<?php include 'footer.php'; ?>