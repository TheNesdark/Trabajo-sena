<nav aria-label="Page navigation mb-5">
    <ul class="pagination justify-content-center mt-3">

        <?php
        echo '<li class="page-item ' . (($pagina == 1) ? 'disabled' : '') . '">
            <a class="page-link" href="?pagina=1' . (isset($_GET['busqueda']) && !empty($_GET['busqueda']) ? '&busqueda=' . urlencode($_GET['busqueda']) : '') . '">Comienzo</a>
              </li>';
        if ($pagina - 1 >= 1) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($pagina - 1) . (isset($_GET['busqueda']) && !empty($_GET['busqueda']) ? '&busqueda=' . urlencode($_GET['busqueda']) : '') . '">' . ($pagina - 1) . '</a></li>';
        }
        echo '<li class="page-item active"><span class="page-link">' . $pagina . '</span></li>';
        if ($pagina + 1 <= $TotalPaginas) {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($pagina + 1) . (isset($_GET['busqueda']) && !empty($_GET['busqueda']) ? '&busqueda=' . urlencode($_GET['busqueda']) : '') . '">' . ($pagina + 1) . '</a></li>';
        }
        echo '<li class="page-item ' . (($pagina == $TotalPaginas) ? 'disabled' : '') . '">
            <a class="page-link" href="?pagina=' . $TotalPaginas . (isset($_GET['busqueda']) && !empty($_GET['busqueda']) ? '&busqueda=' . urlencode($_GET['busqueda']) : '') . '">Final</a>
              </li>';
        ?>
    </ul>
</nav>