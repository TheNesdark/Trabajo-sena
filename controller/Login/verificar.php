<?php
session_start();
if (!isset($_SESSION['usuario'])){
    header("Location: /trabajo-sena/views/login.php");
    exit();
}
?>