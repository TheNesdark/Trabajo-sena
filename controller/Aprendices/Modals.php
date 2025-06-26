<!-- Modal Añadir -->
<div class="modal fade" id="addAprendizModal" tabindex="-1" aria-labelledby="addAprendizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="../controller/Aprendices/Añadir_Aprendices.php" onsubmit="return verificarAprendizExistente();">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAprendizModalLabel">Añadir Aprendiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div id="alertContainer"></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tipo de documento</label>
                        <select class="form-select" name="tipodoc" required>
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
                        <input type="text" class="form-control" name="idaprendiz" id="documento" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular</label>
                        <input type="number" class="form-control" name="celular">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion">
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
                        <select class="form-select" id="editTipodoc" name="tipodoc" required>
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
                        <input type="text" class="form-control" id="editIdAprendiz" name="idaprendiz" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="editNombres" name="nombres">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="editApellidos" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular</label>
                        <input type="text" class="form-control" id="editCelular" name="celular">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" id="editEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="editDireccion" name="direccion">
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
