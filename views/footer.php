<style>
    /* Footer que no oculta contenido */
.footer-admin {
    position: relative; /* Cambiado de fixed a relative */
    bottom: auto;
    left: auto;
    right: auto;
    width: 100%;
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
    padding: 15px 0;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    /* Eliminamos z-index y transform ya que no son necesarios */
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

/* Media queries para responsividad */
@media (max-width: 768px) {
    .footer-admin {
        padding: 12px 0;
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
