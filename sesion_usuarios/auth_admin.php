<?php
    session_start();
    if(!isset($_SESSION["nombre_usuario"]) || $_SESSION['rol'] != "admin"){
    header("Location: ../index.php");
    exit(); }
?>