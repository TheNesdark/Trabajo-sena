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

<!-- Modal Añadir Acción -->
<div class="modal fade" id="addAccionModal" tabindex="-1" aria-labelledby="addAccionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAccionModalLabel">Añadir Nueva Acción</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="../controller/Acciones/Añadir_Acciones.php">
        <div class="modal-body">
          <div class="mb-3">
            <label for="idreporte" class="form-label">ID Reporte</label>
            <input type="text" class="form-control custom-select" id="idreporte" name="idreporte" value="<?php echo $_GET['idreporte']; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control custom-select" id="usuario" name="usuario" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control custom-select" id="descripcion" name="descripcion" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="background: #50c8c6;">Guardar Acción</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Acción -->
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
            $idreporte = $_GET['idreporte'];
            echo "<input type='hidden' name='idreporte' value='$idreporte'>";
          ?>
          <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
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
