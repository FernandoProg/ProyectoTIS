<?php
    require("crud/conexion.php");
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT nombre_usuario, contraseña FROM usuario WHERE '$nombre_usuario' = nombre_usuario AND '$contrasena' = contraseña";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_fetch_assoc($resultado)){
        header("Location: ../proyecto-municipalidad/crud/Administrador");
    }else{
        echo '<script>alert("Usuario y/o contraseña incorrecta");</script>';
        echo '<script>window.location.href="../proyecto-municipalidad"</script>';
    }
?>