<?php
    require("../../conexion.php");

    $nombre_usuario = $_POST["nombreUsuario"];
    $contrasena = $_POST["contrasena"];
    $sql = "INSERT INTO usuario (nombre_usuario, contraseña, rol) VALUES ('$nombre_usuario','".md5($contrasena)."' ,'admin')";
    $resultado = mysqli_query($conexion, $sql);
    header('Location: ../index.php');
?>