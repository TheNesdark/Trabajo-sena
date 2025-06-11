<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
        include 'header.php';
    ?>
<div class="container-fluid py-5 min-vh-100" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="p-4 bg-white shadow rounded-3">
                <h5 class="mb-4 text-primary">Añadir Reporte</h5>
                <form method="POST" action="../controller/Reportes/Añadir_Reportes.php">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="idaprendiz">Aprendiz</label>
                            <select name="idaprendiz" id="idaprendiz" class="form-select" required>
                                <option value="" disabled selected>Seleccione un aprendiz</option>
                                <?php
                                include '../controller/Aprendices/Listar_Aprendices.php';
                                $aprendices = listarAprendices();
                                if (!$aprendices) {
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
                            <label class="form-label" for="nficha">Ficha</label>
                            <select name="nficha" id="nficha" class="form-select" required>
                                <option value="" disabled selected>Seleccione una ficha</option>
                                <?php
                                include '../controller/Fichas/Listar_Fichas.php';
                                $fichas = listarFichas();
                                if (!$fichas) {
                                    echo "<option value=''>No hay fichas disponibles</option>";
                                } else {
                                    foreach ($fichas as $ficha) {
                                        echo "<option value='{$ficha['nficha']}'>{$ficha['nficha']}</option>";
                                    }
                                }
                                ?>
                            </select>   
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Motivo</label>
                            <select name="idmotivo" class="form-select" required>
                                <option value="" disabled selected>Seleccione un motivo</option>
                                <?php
                                include '../controller/Motivos/Listar_Motivos.php';
                                $motivos = listarMotivos();
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
                            <label class="form-label">Fallas</label>
                            <input type="number" class="form-control" name="fallas">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Observaciones</label>
                            <textarea class="form-control" name="observaciones"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="" disabled selected>Seleccione un estado</option>
                                <option value="En Revision">En Revision</option>
                                <option value="Reingreso">Reingreso</option>
                                <option value="Desercion">Desercion</option>
                            </select>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-secondary me-2">Limpiar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
