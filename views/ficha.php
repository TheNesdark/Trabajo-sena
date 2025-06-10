<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php 
        include 'header.php';
        include '../controller/Fichas/Listar_Fichas.php';
        include '../controller/Fichas/Modals.php';

    ?>
    <div id="alerta"></div>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Fichas</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFichaModal">Añadir Ficha</button>
        </div>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <thead>
                <tr>

                    <th style="width: 30%;">Número Ficha</th>
                    <th style="width: 30%;">Programa</th>
                    <th style="width: 20%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $fichas = listarFichas();
                foreach ($fichas as $ficha): ?>
                    <tr>
                        <td><?php echo $ficha['nficha']; ?></td>
                        <td><?php echo $ficha['nombreprograma']; ?></td>
                        <td>
                            <a href="../controller/Fichas/Eliminar_Fichas.php?id=<?php echo $ficha['nficha']; ?>" class="btn btn-primary">Eliminar</a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editFichaModal" onclick="CargarDatos(<?php echo $ficha['nficha']; ?>, '<?php echo htmlspecialchars($ficha['nficha']); ?>', '<?php echo htmlspecialchars($ficha['nombreprograma']); ?>')">Editar</button>
                        </td>
                    </tr>  
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<script>
<?php include 'Alertas.php'; ?>

function CargarDatos(id, numero, idprograma) {
    document.getElementById('numero').value = id;
    document.getElementById('editIdPrograma').value = idprograma;
}
</script>
</body>
</html>