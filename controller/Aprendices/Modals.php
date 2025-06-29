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
    background-color: rgb(80, 200, 198, 0.25);
    border-color: #3abdb9;
    box-shadow: 0 0 5px rgba(58, 189, 185, 0.5);
    outline: none;
  }

</style>
<div class="modal fade" id="addAprendizModal" tabindex="-1" aria-labelledby="addAprendizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
            require_once '../controller/Fichas/Listar_Fichas.php';
            $fichas = listarFichas(1, PHP_INT_MAX);
            ?>
            <form method="POST" action="../controller/Aprendices/Añadir_Aprendices.php" onsubmit="return verificarAprendizExistente();">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAprendizModalLabel">Añadir Aprendiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div id="alertContainer"></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Ficha</label>
                        <select class="form-select custom-select" name="nficha" required>
                            <option value="" disabled selected>Seleccione una ficha</option>
                            <?php foreach ($fichas as $ficha): ?>
                                <option value="<?php echo htmlspecialchars($ficha['nficha']); ?>">
                                    <?php echo htmlspecialchars($ficha['nficha'] . ' - ' . $ficha['nombreprograma']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de documento</label>
                        <select class="form-select custom-select" name="tipodoc" required>
                            <option value="" disabled selected>Seleccione un tipo de documento</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="PA">Pasaporte</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Documento</label>
                        <input type="text" class="form-control custom-select" name="idaprendiz" id="documento" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" class="form-control custom-select" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control custom-select" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular</label>
                        <input type="number" class="form-control custom-select" name="celular">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control custom-select" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control custom-select" name="direccion">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" style="background: #50c8c6;">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editAprendizModal" tabindex="-1" aria-labelledby="editAprendizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="../controller/Aprendices/Editar_Aprendices.php" >
                <div class="modal-header">
                    <h5 class="modal-title" id="editAprendizModalLabel">Editar Aprendiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div id="alertContainer"></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tipo de documento</label>
                        <select class="form-select custom-select" id="editTipodoc" name="tipodoc" required>
                            <option value="" disabled>Seleccione un tipo de documento</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="PA">Pasaporte</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Documento</label>
                        <input type="text" class="form-control custom-select" id="editIdAprendiz" name="idaprendiz" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" class="form-control custom-select" id="editNombres" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control custom-select" id="editApellidos" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular</label>
                        <input type="text" class="form-control custom-select" id="editCelular" name="celular">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control custom-select" id="editEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control custom-select" id="editDireccion" name="direccion">
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
