<?php
    require("crud/conexion.php");
    $nombre_admin = $_POST["nombre_admin"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT nombre_admin, contraseña FROM administrador WHERE '$nombre_admin' = nombre_admin AND '$contrasena' = contraseña";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_fetch_assoc($resultado)){
        header("Location: ../proyecto-municipalidad/crud/Administrador");
    }else{
        echo '<script>alert("Usuario y/o contraseña incorrecta");</script>';
        echo '<script>window.location.href="../proyecto-municipalidad"</script>';
    }
?>