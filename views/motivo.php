
<?php
include '../config.php';
include '../controller/consultas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Motivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
     <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Motivos</h1>
        <table class="table table-striped border-black" style="border: 2px solid black;">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">nuevo motivo</button>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $motivos = listar("motivo");
                    foreach ($motivos as $motivo): ?>
                <tr>
                    <td><?php echo $motivo['idmotivo']; ?></td>
                    <td><?php echo $motivo['descripcion']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $motivo['idmotivo']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?php echo $motivo['idmotivo']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>






    <!-- Botón para abrir el modal -->


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Formulario de Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje:</label>
                        <textarea class="form-control" id="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault();
        alert("Formulario enviado con éxito.");
    });
</script>


</body>
</html>
