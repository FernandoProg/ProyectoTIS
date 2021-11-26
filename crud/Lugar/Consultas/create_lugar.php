<?php
    require("../../conexion.php");

    $nombreLugar = $_POST["nombreLugar"];
    $latitudLugar = $_POST["latitudLugar"];
    $longitudLugar = $_POST["longitudLugar"];
    $categoriaLugar = $_POST["categoriaLugar"];
    $nombreUsuario = $_POST["nombreUsuario"];

    $query = "INSERT INTO lugar(nombre_lugar, latitud_lugar, longitud_lugar, categoria_lugar, nombre_admin) VALUES ('$nombreLugar','$latitudLugar','$longitudLugar','$categoriaLugar','$nombreUsuario')";
    $insert = mysqli_query($conexion,$query);
    header('location: ../');
?>