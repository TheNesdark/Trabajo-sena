<?php 
include '../controller/Aprendices/Listar_Aprendices.php';
include '../controller/Fichas/Listar_Fichas.php';
include '../controller/Motivos/Listar_Motivos.php';
include 'header.php';


if (!isset($_GET['nficha'])) {
    $fichas = listarFichas(1, PHP_INT_MAX); 
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Seleccionar Ficha</title>
        <style>
            .form-section-title {
                font-size: 1.1rem;
                font-weight: 500;
                color: #50c8c6;
                margin-bottom: 1rem;
            }
            .bg-form {
                background: #fff;
                border-radius: 1rem;
                box-shadow: 0 2px 16px 0 rgba(80,200,198,0.08);
                padding: 2rem 2.5rem;
            }
            .btn-primary, .btn-primary:focus {
                background-color: #50c8c6;
                border-color: #50c8c6;
            }
            .btn-primary:hover {
                background-color: #3bb3b1;
                border-color: #3bb3b1;
            }
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
    </head>
    <body class="bg-light">
        <div class="container py-5 min-vh-100">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="bg-form">
                        <h4 class="mb-4 text-center form-section-title">
                            <i class="fa-solid fa-list"></i> Seleccionar Ficha
                        </h4>
                        <form method="GET" action="">
                            <div class="mb-4">
                                <label class="form-label" for="nficha">
                                    <i class="fa-solid fa-id-card"></i> Ficha
                                </label>
                                <select name="nficha" id="nficha" class="form-select custom-select" required>
                                    <option value="" disabled selected>Seleccione una ficha</option>
                                    <?php
                                    if (!$fichas) {
                                        echo "<option value=''>No hay fichas disponibles</option>";
                                    } else {
                                        foreach ($fichas as $ficha) {
                                            echo "<option value='{$ficha['nficha']}'>{$ficha['nficha']} - {$ficha['programa']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-arrow-right"></i> Continuar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit; 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Reporte</title>
    <style>
        .form-label i {
            margin-right: 6px;
            color: #50c8c6;
        }
        .form-control:focus, .form-select:focus {
            border-color: #50c8c6;
            box-shadow: 0 0 0 0.2rem rgba(80,200,198,.25);
        }
        .form-section-title {
            font-size: 1.1rem;
            font-weight: 500;
            color: #50c8c6;
            margin-bottom: 1rem;
        }
        .bg-form {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 16px 0 rgba(80,200,198,0.08);
            padding: 2rem 2.5rem;
        }
        .btn-primary, .btn-primary:focus {
            background-color: #50c8c6;
            border-color: #50c8c6;
        }
        .btn-primary:hover {
            background-color: #3bb3b1;
            border-color: #3bb3b1;
        }
        .btn-secondary {
            background-color: #e9ecef;
            color: #333;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #d1d5db;
            color: #222;
        }
    </style>
    
</head>
<body class="bg-light">
    <div class="container py-5 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="bg-form">
                    <h4 class="mb-4 text-center form-section-title">
                        <i class="fa-solid fa-file-circle-plus"></i> Añadir Reporte
                    </h4>
                    <form method="POST" action="../controller/Reportes/Añadir_Reportes.php">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label" for="nficha">
                                    <i class="fa-solid fa-id-card"></i> Número de Ficha
                                </label>
                                <input type="text" class="form-control custom-select" name="nficha" id="nficha" value="<?php echo htmlspecialchars($_GET['nficha']); ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="idaprendiz">
                                    <i class="fa-solid fa-user-graduate"></i> Aprendiz
                                </label>
                                <select name="idaprendiz" id="idaprendiz" class="form-select select2" required>
                                    <option value="" disabled selected>Seleccione un aprendiz</option>
                                    <?php
                                    $nficha = $_GET['nficha']; 
                                    $aprendices = listarAprendizFicha($nficha);
                                    if (!is_array($aprendices) || empty($aprendices)) {
                                        echo "<option value=''>No hay aprendices disponibles</option>";
                                    } else {
                                        foreach ($aprendices as $aprendiz) {
                                            echo "<option value='{$aprendiz['idaprendiz']}'>{$aprendiz['nombres']} {$aprendiz['apellidos']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    <i class="fa-solid fa-circle-question"></i> Motivo
                                </label>
                                <select name="idmotivo" class="form-select" required>
                                    <option value="" disabled selected>Seleccione un motivo</option>
                                    <?php
                                    $motivos = listarMotivos(1, PHP_INT_MAX);
                                    if (!$motivos) {
                                        echo "<option value=''>No hay motivos disponibles</option>";
                                    } else {
                                        foreach ($motivos as $motivo) {
                                            echo "<option value='{$motivo['idmotivo']}'>{$motivo['descripcion']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    <i class="fa-solid fa-exclamation"></i> Fallas
                                </label>
                                <input type="number" class="form-control" name="fallas" min="0">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    <i class="fa-solid fa-eye"></i> Observaciones
                                </label>
                                <textarea class="form-control" name="observaciones" rows="2"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    <i class="fa-solid fa-toggle-on"></i> Estado
                                </label>
                                <select name="estado" class="form-select" required>
                                    <option value="" disabled selected>Seleccione un estado</option>
                                    <option value="En Revision">En Revisión</option>
                                    <option value="Reingreso">Reingreso</option>
                                    <option value="Desercion">Deserción</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="reset" class="btn btn-danger me-2">
                                <i class="fa-solid fa-eraser"></i> Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
