<?php include_once __DIR__ . '/../controller/Login/verificar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="..\assets\css\style.css" >
    <link rel="stylesheet" href="..\assets\css\style-paginacion.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand fs-5 fw-bold" href="\trabajo-sena\index.php"> <img src="\trabajo-sena\assets\img\logo-sena-negro-png-2022.png" alt ="logo" width="80" height="80" style="margin-right: 10px;">
                    Deserción SENA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/Trabajo-sena/views/reportes.php">
                                <i class="fas fa-chart-line"></i>Ver Reportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Trabajo-sena/views/Nuevo_Reporte.php">
                                <i class="fas fa-plus-circle"></i>Crear Reporte
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Trabajo-sena/controller/Login/Cerrar.php">
                                <i class="fas fa-sign-out-alt me-1"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
