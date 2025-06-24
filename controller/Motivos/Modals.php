
<div class="modal fade" id="addMotivoModal" tabindex="-1" aria-labelledby="addMotivoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMotivoModalLabel">Añadir Nuevo Motivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="../controller/Motivos/Añadir_Motivos.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Motivo</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editMotivoModal" tabindex="-1" aria-labelledby="editMotivoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMotivoModalLabel">Editar Motivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../controller/Motivos/Editar_Motivos.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editIdMotivo" class="form-label">ID</label>
                        <input type="text" class="form-control" id="editIdMotivo" name="idmotivo" readonly>
                    </div>
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
