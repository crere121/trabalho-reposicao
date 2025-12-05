<?php
session_start();
session_destroy();
header("Location: login.php");
exit; // CRÍTICO: Adicionado exit para garantir que o script pare
?>