
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="/trabajo-sena/assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'views/header.php'; ?>
<div class="container mt-5">
    <div class="hero-section">
                <h1>Sistema Deserción</h1>
                <p class="subtitle">Administra la deserción en SENA de manera eficiente</p>
            </div>

    <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card-module">
                        <h4 class="text-center mb-3">
                            <i class="fa-solid fa-building-columns" style="color: #cee891;"></i>
                            Personas
                        </h4>
                        <a href="views/aprendiz.php" class="module-btn btn-personas">
                            <i class="fas fa-address-book"></i>
                            Aprendiz
                        </a>
                        <a href="views\Usuarios.php" class="module-btn btn-personas">
                            <i class="fas fa-address-book"></i>
                            Usuarios
                        </a>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-module">
                        <h4 class="text-center mb-3">
                            <i class="fa-solid fa-book-bookmark" style="color: #50c8c6;"></i>
                            Cursos
                        </h4>
                        <a href="views/programa.php" class="module-btn btn-cursos">
                            <i class="fas fa-money7-bill-wave"></i>
                            Programas
                        </a>
                        <p class="text-muted text-center small">Controla todos los programas de formación</p>

                    </div>
                </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>