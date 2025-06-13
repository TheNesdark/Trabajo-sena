
<div class="modal fade" id="addAccionModal" tabindex="-1" aria-labelledby="addAccionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccionModalLabel">Añadir Nueva Acción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="../controller/Acciones/Añadir_Acciones.php">
                <div class="modal-body">

                    <label for="idreporte" class="form-label">ID Reporte</label>
                    <input type="text" class="form-control" id="idreporte" name="idreporte" value="<?php $idreporte ?>" readonly>
                    <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Acción</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editAccionModal" tabindex="-1" aria-labelledby="editAccionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccionModalLabel">Editar Acción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="../controller/Acciones/Editar_Acciones.php">
                <div class="modal-body">
                    <?php
                    if (isset($_GET['idreporte'])) {
                        $idreporte = $_GET['idreporte'];
                        echo "<input type='hidden' name='idreporte' value='$idreporte'>";
                    } else {
                        echo "<input type='hidden' name='idreporte' value=''>";
                    }
                    ?>
                    <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                    <div class="mb-3">
                        <label for="editDescripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="editDescripcion" name="descripcion" required>
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