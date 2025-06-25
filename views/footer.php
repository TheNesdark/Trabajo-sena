<style>
/* Footer fijo que no oculta contenido */
.footer-admin {
    position: fixed !important;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100% !important;
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
    padding: 15px 0;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

/* Espacio en el body para que no se oculte contenido */
body {
    padding-bottom: 100px; /* Aumentado de 80px a 100px */
}

/* Estilos para los enlaces del footer */
.footer-link {
    transition: color 0.2s ease;
}

.footer-link:hover {
    color: #007bff !important;
}

/* Badge de versión */
.version-badge {
    background-color: #28a745;
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.85rem;
    display: inline-block;
}

/* Ajustes para móviles */
@media (max-width: 768px) {
    .footer-admin {
        padding: 12px 0;
    }
    
    body {
        padding-bottom: 120px; /* Más espacio en móviles porque el contenido es más alto */
    }
    
    .admin-actions {
        justify-content: center;
    }
    
    .version-badge {
        font-size: 0.8rem;
        padding: 4px 8px;
    }
}
</style>
<footer class="footer-admin mt-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0 d-flex align-items-center">
                <img src="/trabajo-sena/assets/img/logo-sena-negro-png-2022.png" alt="logo" width="30" height="30" style="margin-right: 10px;">
                <span>SENA - Sistema de Deserción © 2025</span>
            </div>
            <div class="col-lg-5 col-md-6 col-12 mb-2 mb-lg-0">
                <div class="admin-actions d-flex flex-wrap gap-3">
                    <a href="/trabajo-sena/index.php" class="footer-link text-decoration-none text-dark">
                        <i class="fas fa-tachometer-alt"></i> Panel
                    </a>
                    <a href="/trabajo-sena/views/Usuarios.php" class="footer-link text-decoration-none text-dark">
                        <i class="fas fa-users"></i> Usuarios
                    </a>
                    <a href="#" class="footer-link text-decoration-none text-dark">
                        <i class="fas fa-headset"></i> Soporte
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-12 text-center text-lg-end">
                <div class="version-badge">
                    <i class="fas fa-code-branch"></i> v2.1.4 - Online
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoA6DQD1P1L1QnYh5lZ9gIK3z0I1hKf6QJp4YL+XW+XW+XW" crossorigin="anonymous"></script>
