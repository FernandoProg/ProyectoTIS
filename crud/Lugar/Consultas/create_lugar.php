<?php
    require("../../conexion.php");

    $nombreLugar = $_POST["nombreLugar"];
    $latitudLugar = $_POST["latitudLugar"];
    $longitudLugar = $_POST["longitudLugar"];
    $categoriaLugar = $_POST["categoriaLugar"];
    $nombreAdmin = $_POST["nombreAdmin"];

    $query = "INSERT INTO lugar VALUES ('','$nombreLugar','$latitudLugar','$longitudLugar','$categoriaLugar','$nombreAdmin')";
    $insert = mysqli_query($conexion,$query);
    
    header('location: ../');
?>