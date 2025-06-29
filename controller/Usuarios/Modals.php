
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

<!-- Modal Añadir Usuario -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Añadir Nuevo Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="../controller/Usuarios/Añadir_Usuarios.php" onsubmit="return verificarUsuarioExistente();">
        <div class="modal-body">
          <div id="alertContainer"></div>
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control custom-select" id="usuario" name="usuario" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control custom-select" id="nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control custom-select" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control custom-select" id="password" name="password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn" style="background: #50c8c6;">Guardar Usuario</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Editar Usuario -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../controller/Usuarios/Editar_Usuarios.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="editUsuario" class="form-label">Usuario</label>
            <input type="text" class="form-control custom-select" id="editUsuario" name="usuario" readonly>
          </div>
          <div class="mb-3">
            <label for="editNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control custom-select" id="editNombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control custom-select" id="editEmail" name="email" required>
          </div>
          <div class="mb-3">
            <label for="editPassword" class="form-label">Nueva Contraseña</label>
            <input type="password" class="form-control custom-select" id="editPassword" name="password" placeholder="Ingrese nueva contraseña">
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


