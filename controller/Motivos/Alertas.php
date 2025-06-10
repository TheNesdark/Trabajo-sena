
let alerta = document.getElementById('alerta');
<?php if (isset($_GET['mensaje'])): ?>
    <?php if ($_GET['mensaje'] === 'agregado'): ?>
        alerta.innerHTML = '<div class="alert alert-success slide-out">Motivo agregado exitosamente.</div>';
    <?php elseif ($_GET['mensaje'] === 'eliminado'): ?>
        alerta.innerHTML = '<div class="alert alert-success slide-out">Motivo eliminado exitosamente.</div>';
    <?php elseif ($_GET['mensaje'] === 'error'): ?>
        alerta.innerHTML = '<div class="alert alert-danger slide-out">Se ha presentado un error.</div>';
    <?php elseif ($_GET['mensaje'] === 'actualizado'): ?>
        alerta.innerHTML = '<div class="alert alert-success slide-out">Motivo actualizado exitosamente.</div>';
    <?php endif; ?>
    setTimeout(() => {
        let alertDiv = alerta.querySelector('.slide-out');
        alertDiv.style.transition = 'transform 1s ease-in-out';
        alertDiv.style.transform = 'translateX(100%)';
        setTimeout(() => {
            alerta.innerHTML = '';
        }, 1000);
    }, 5000);
<?php endif; ?>