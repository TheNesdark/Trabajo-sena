<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mt-3">
        <li class="page-item <?= ($pagina <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?pagina=<?= $pagina - 1 ?><?= isset($_GET['busqueda']) && !empty($_GET['busqueda']) ? '&busqueda=' . urlencode($_GET['busqueda']) : '' ?>" tabindex="-1" aria-disabled="<?= ($pagina <= 1) ? 'true' : 'false' ?>">← Anterior</a>
        </li>

        <li class="page-item active" aria-current="page">
            <span class="page-link">
                <?= $pagina ?>
            </span>
        </li>

        <li class="page-item <?= ($pagina >= $TotalPaginas) ? 'disabled' : '' ?>">
            <a class="page-link" href="?pagina=<?= $pagina + 1 ?><?= isset($_GET['busqueda']) && !empty($_GET['busqueda']) ? '&busqueda=' . urlencode($_GET['busqueda']) : '' ?>">Siguiente →</a>
        </li>
    </ul>
</nav>
