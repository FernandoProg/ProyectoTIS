<?php
    require("../../conexion.php");
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];
    $correo_usuario = $_POST["correo_usuario"];

    $sql = "INSERT INTO usuario (nombre_usuario, contraseña, rol, correo_usuario) VALUES ('$nombre_usuario','".md5($contrasena)."','admin', '$correo_usuario')";
    $resultado = mysqli_query($conexion, $sql);
    header('Location: ../index.php');
?>