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

<!-- Modal Añadir Ficha -->
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
            <input type="text" class="form-control custom-select" id="numero" name="numero" required>
          </div>
          <div class="mb-3">
            <label for="idprograma" class="form-label">Programa</label>
            <select name="idprograma" id="idprograma" class="form-select custom-select" required>
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
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="background: #50c8c6;">Guardar Ficha</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Ficha -->
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
            <input type="text" class="form-control custom-select" id="editNumero" name="numero" readonly>
          </div>
          <div class="mb-3">
            <label for="idprograma" class="form-label">Programa</label>
            <select name="idprograma" id="idprograma" class="form-select custom-select" required>
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
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="background: #50c8c6;">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
