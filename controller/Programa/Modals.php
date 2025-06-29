
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

<!-- Modal Añadir Programa -->
<div class="modal fade" id="addProgramaModal" tabindex="-1" aria-labelledby="addProgramaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProgramaModalLabel">Añadir Nuevo Programa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="../controller/Programa/Añadir_Programa.php">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control custom-select" id="nombre" name="nombre" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="background: #50c8c6;">Guardar Programa</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Programa -->
<div class="modal fade" id="editProgramaModal" tabindex="-1" aria-labelledby="editProgramaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProgramaModalLabel">Editar Programa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../controller/Programa/Editar_Programa.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="editIdPrograma" class="form-label">ID</label>
            <input type="text" class="form-control custom-select" id="editIdPrograma" name="idprograma" readonly>
          </div>
          <div class="mb-3">
            <label for="editNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control custom-select" id="editNombre" name="nombre" required>
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
