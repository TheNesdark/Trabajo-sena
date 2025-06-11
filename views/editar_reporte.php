<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
    include 'header.php';
    include '../config.php';

    $idreporte = $_GET['idreporte'];
    try {
        $stmt = $pdo->query("SELECT * FROM reportes WHERE idreporte = $idreporte");
        $reporte = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        header("Location: ../../views/Reportes.php?mensaje=error");
        exit();
    }
    ?>
<div class="container-fluid py-5 min-vh-100" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="p-4 bg-white shadow rounded-3">
                <h5 class="mb-4 text-primary">Editar Reporte</h5>
                <form method="POST" action="../controller/Reportes/Editar_Reportes.php">
                    <input type="hidden" name="idreporte" value="<?php echo htmlspecialchars($reporte['idreporte']); ?>">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="idaprendiz">Aprendiz</label>
                            <select name="idaprendiz" id="idaprendiz" class="form-select" required>
                                <option value="" disabled>Seleccione un aprendiz</option>
                                <?php
                                include '../controller/Aprendices/Listar_Aprendices.php';
                                $aprendices = listarAprendices();
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
                            <label class="form-label" for="nficha">Ficha</label>
                            <select name="nficha" id="nficha" class="form-select" required>
                                <option value="" disabled>Seleccione una ficha</option>
                                <?php
                                include '../controller/Fichas/Listar_Fichas.php';
                                $fichas = listarFichas();
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
                            <label class="form-label">Motivo</label>
                            <select name="idmotivo" class="form-select" required>
                                <option value="" disabled>Seleccione un motivo</option>
                                <?php
                                include '../controller/Motivos/Listar_Motivos.php';
                                $motivos = listarMotivos();
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
                            <label class="form-label">Fallas</label>
                            <input type="number" class="form-control" name="fallas" value="<?php echo htmlspecialchars($reporte['fallas']); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Observaciones</label>
                            <textarea class="form-control" name="observaciones"><?php echo htmlspecialchars($reporte['observaciones']); ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="" disabled>Seleccione un estado</option>
                                <option value="En Revision" <?php if($reporte['estado'] == 'En Revision') echo 'selected'; ?>>En Revision</option>
                                <option value="Reingreso" <?php if($reporte['estado'] == 'Reingreso') echo 'selected'; ?>>Reingreso</option>
                                <option value="Desercion" <?php if($reporte['estado'] == 'Desercion') echo 'selected'; ?>>Desercion</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha Reporte</label>
                            <input type="date" class="form-control" name="fecha" value="<?php echo htmlspecialchars($reporte['fecha']); ?>" readonly>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="listar_reportes.php" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>