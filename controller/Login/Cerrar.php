<?php
session_start();
session_destroy();
header("Location: /Trabajo-sena/views/login.php");
exit();
?>