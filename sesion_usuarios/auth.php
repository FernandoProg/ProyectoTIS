<?php
    session_start();
    if(!isset($_SESSION["nombre_usuario"]) || $_SESSION['rol'] != "usuario"){
    header("Location: ../index.php");
    exit(); }
?>
