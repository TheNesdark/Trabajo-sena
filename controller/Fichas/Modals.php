
<div class="modal fade" id="addFichaModal" tabindex="-1" aria-labelledby="addFichaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFichaModalLabel">Añadir Nueva Ficha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="alertContainer"></div>
            <form method="POST" action="../controller/Fichas/Añadir_Fichas.php" onsubmit="return verificarFichaExistente()">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número de Ficha</label>
                        <input type="text" class="form-control" id="numero" name="numero" required>
                    </div>
                    <div class="mb-3">
                        <label for="idprograma" class="form-label">Programa</label>
                        <select name="idprograma" id="idprograma" class="form-select" required>
                            <option value="" disabled selected>Seleccione un Programa</option>
                            <?php
                            include '../controller/Programa/Listar_Programa.php';
                            $programas = listarProgramas(1, PHP_INT_MAX);
                            foreach ($programas as $programa) {
                                echo "<option value='{$programa['idprograma']}'>{$programa['nombreprograma']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Ficha</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editFichaModal" tabindex="-1" aria-labelledby="editFichaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFichaModalLabel">Editar Ficha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../controller/Fichas/Editar_Fichas.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editNumero" class="form-label">Número de Ficha</label>
                        <input type="text" class="form-control" id="editNumero" name="numero" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editPrograma" class="form-label">Programa</label>
                        <select name="idprograma" id="idprograma" class="form-select" required>
                            <option value="" disabled selected>Seleccione un Programa</option>
                            <?php
                            foreach ($programas as $programa) {
                                echo "<option value='{$programa['idprograma']}'>{$programa['nombreprograma']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>