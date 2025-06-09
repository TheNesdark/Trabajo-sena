let alerta = document.getElementById('alerta');
<?php if (isset($_GET['mensaje'])): ?>
    <?php if ($_GET['mensaje'] === 'agregado'): ?>
        alerta.innerHTML = '<div class="alert alert-success slide-out">Usuario agregado exitosamente.</div>';
    <?php elseif ($_GET['mensaje'] === 'eliminado'): ?>
        alerta.innerHTML = '<div class="alert alert-success slide-out">Usuario eliminado exitosamente.</div>';
    <?php elseif ($_GET['mensaje'] === 'error'): ?>
        alerta.innerHTML = '<div class="alert alert-danger slide-out">Se ha presentado un error.</div>';
    <?php elseif ($_GET['mensaje'] === 'actualizado'): ?>
        alerta.innerHTML = '<div class="alert alert-success slide-out">Usuario actualizado exitosamente.</div>';
    <?php endif; ?>
    setTimeout(() => {
        let alertDiv = alerta.querySelector('.slide-out');
        alertDiv.style.transition = 'transform 1s ease-in-out'; // Transición suave
        alertDiv.style.transform = 'translateX(100%)'; // Desplazamiento hacia la derecha
        setTimeout(() => {
            alerta.innerHTML = '';
        }, 1000); // Tiempo para que la animación termine
    }, 5000);
<?php endif; ?>
