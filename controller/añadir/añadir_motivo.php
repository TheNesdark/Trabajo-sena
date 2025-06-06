<?php
include '../config.php';
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo_fabricante = $_POST['codigo_fabricante'];
    $sql = "INSERT INTO producto (nombre,precio,codigo_fabricante) VALUES ('$nombre', '$precio', '$codigo_fabricante')";
    if (mysqli_query($conn, $sql)) {
        header("Location:productos_listar.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>



<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Formulario de Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="contactForm" meth>
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
