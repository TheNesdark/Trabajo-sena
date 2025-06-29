
<style>
  .custom-select {
    background-color: #f8f9fa;
    border: 2px solid #50c8c6;
    border-radius: 12px;
    padding: 10px 12px;
    color: #333;
    font-weight: 500;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
    transition: border-color 0.5s, box-shadow 0.3s;
  }

  .custom-select:focus {
    background-color: rgba(80, 200, 198, 0.25);
    border-color: #3abdb9;
    box-shadow: 0 0 5px rgba(58, 189, 185, 0.5);
    outline: none;
  }
</style>

<!-- Modal Añadir Motivo -->
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
            <input type="text" class="form-control custom-select" id="descripcion" name="descripcion" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="background: #50c8c6;">Guardar Motivo</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Motivo -->
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
            <input type="text" class="form-control custom-select" id="editIdMotivo" name="idmotivo" readonly>
          </div>
          <div class="mb-3">
            <label for="editDescripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control custom-select" id="editDescripcion" name="descripcion" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="background: #50c8c6;">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

