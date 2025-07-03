<?php
session_start();
session_destroy();
header("Location: /trabajo-sena/views/login.php");
exit();
?>