<?php
    require("../../conexion.php");
    $nombre_admin = $_POST["nombre_admin"];
    $contrasena = $_POST["contrasena"];

    $sql = "INSERT INTO administrador (nombre_admin, contraseña) VALUES ('$nombre_admin','$contrasena')";
    $resultado = mysqli_query($conexion, $sql);
    header('Location: ../index.php');
?>