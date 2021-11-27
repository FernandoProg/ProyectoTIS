<?php
    require("../../conexion.php");
    $nombre_contribucion = $_POST["nombre_contribucion"];
    $correo_contribucion = $_POST["correo_contribucion"];
    $descripcion_contribucion = $_POST["descripcion_contribucion"];
    $departamento = $_POST["departamento"];

    $sql = "INSERT INTO usuario (nombre_usuario, contraseña, rol) VALUES ('$nombre_usuario','$contrasena','admin')";
    $resultado = mysqli_query($conexion, $sql);
    header('Location: ../index.php');
?>