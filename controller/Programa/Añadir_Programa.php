
<?php
include '../../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    try {
        $stmt = $pdo->prepare("INSERT INTO programa (nombreprograma) VALUES (?)");
        $stmt->execute([$nombre]);
        header("Location: ../../views/programa.php?mensaje=agregado");
        exit();
    } catch (PDOException $e) {
        header("Location: ../../views/programa.php?mensaje=error");
        exit();
    }
}
?>