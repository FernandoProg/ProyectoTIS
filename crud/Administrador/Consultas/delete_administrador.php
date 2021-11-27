<?php
    require("../../conexion.php");

    $nombre_usuario = $_GET["seleccionado"];

    $sql = "DELETE FROM usuario WHERE nombre_usuario = '$nombre_usuario'"; 
    $resultado = mysqli_query($conexion, $sql);

    header('Location: ../index.php');
?>