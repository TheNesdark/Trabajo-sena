<?php 
include 'header.php';
include '../config.php';
include '../controller/Aprendices/Listar_Aprendices.php';
include '../controller/Fichas/Listar_Fichas.php';
include '../controller/Motivos/Listar_Motivos.php';

$idreporte = $_GET['idreporte'];

try {
    $stmt = $pdo->query("SELECT * FROM reportes WHERE idreporte = $idreporte");
    $reporte = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header("Location: ../../views/Reportes.php?mensaje=error");
    exit();
}

$aprendices = listarAprendices(1,PHP_INT_MAX);
$fichas = listarFichas(1,PHP_INT_MAX);
$motivos = listarMotivos(1,PHP_INT_MAX);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reporte</title>
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
                    <i class="fa-solid fa-file-circle-plus"></i> Editar Reporte
                </h4>
                <form method="POST" action="../controller/Reportes/Editar_Reportes.php">
                    <input type="hidden" name="idreporte" value="<?php echo htmlspecialchars($reporte['idreporte']); ?>">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label" for="idaprendiz">
                                <i class="fa-solid fa-user-graduate"></i> Aprendiz
                            </label>
                            <select name="idaprendiz" id="idaprendiz" class="form-select" required>
                                <option value="" disabled>Seleccione un aprendiz</option>
                                <?php
                                if (!$aprendices) {
                                    echo "<option value=''>No hay aprendices disponibles</option>";
                                } else {
                                    foreach ($aprendices as $aprendiz) {
                                        $selected = ($aprendiz['idaprendiz'] == $reporte['idaprendiz']) ? "selected" : "";
                                        echo "<option value='{$aprendiz['idaprendiz']}' $selected>{$aprendiz['nombres']} {$aprendiz['apellidos']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="nficha">
                                <i class="fa-solid fa-list-ol"></i> Ficha
                            </label>
                            <select name="nficha" id="nficha" class="form-select" required>
                                <option value="" disabled>Seleccione una ficha</option>
                                <?php
                                if (!$fichas) {
                                    echo "<option value=''>No hay fichas disponibles</option>";
                                } else {
                                    foreach ($fichas as $ficha) {
                                        $selected = ($ficha['nficha'] == $reporte['nficha']) ? "selected" : "";
                                        echo "<option value='{$ficha['nficha']}' $selected>{$ficha['nficha']}</option>";
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
                                <option value="" disabled>Seleccione un motivo</option>
                                <?php
                                if (!$motivos) {
                                    echo "<option value=''>No hay motivos disponibles</option>";
                                } else {
                                    foreach ($motivos as $motivo) {
                                        $selected = ($motivo['idmotivo'] == $reporte['idmotivo']) ? "selected" : "";
                                        echo "<option value='{$motivo['idmotivo']}' $selected>{$motivo['descripcion']}</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="fa-solid fa-exclamation"></i> Fallas
                            </label>
                            <input type="number" class="form-control" name="fallas" value="<?php echo htmlspecialchars($reporte['fallas']); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="fa-solid fa-eye"></i> Observaciones
                            </label>
                            <textarea class="form-control" name="observaciones"><?php echo htmlspecialchars($reporte['observaciones']); ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="fa-solid fa-toggle-on"></i> Estado
                            </label>
                            <select name="estado" class="form-select" required>
                                <option value="" disabled>Seleccione un estado</option>
                                <option value="En Revision" <?php if($reporte['estado'] == 'En Revision') echo 'selected'; ?>>En Revision</option>
                                <option value="Reingreso" <?php if($reporte['estado'] == 'Reingreso') echo 'selected'; ?>>Reingreso</option>
                                <option value="Desercion" <?php if($reporte['estado'] == 'Desercion') echo 'selected'; ?>>Desercion</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="fa-solid fa-calendar"></i> Fecha Reporte
                            </label>
                            <input type="date" class="form-control" name="fecha" value="<?php echo htmlspecialchars($reporte['fecha']); ?>" readonly>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="listar_reportes.php" class="btn btn-secondary me-2">
                            <i class="fa-solid fa-ban"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save"></i> Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>