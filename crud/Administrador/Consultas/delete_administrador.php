<?php
    require("../../conexion.php");

    $nombre_admin = $_GET["seleccionado"];

    $sql = "DELETE FROM administrador WHERE nombre_admin = '$nombre_admin'"; 
    $resultado = mysqli_query($conexion, $sql);

    header('Location: ../index.php');
?>