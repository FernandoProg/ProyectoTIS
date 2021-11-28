<?php
    require("../../conexion.php");

    $nombreLugar = $_POST["nombreLugar"];
    $latitudLugar = $_POST["latitudLugar"];
    $longitudLugar = $_POST["longitudLugar"];
    if(intval($latitudLugar) == 0 && intval($longitudLugar) == 0){
        echo '<script>alert("No haz seleccionado un lugar");</script>';
        echo '<script>window.location.href="../index.php"</script>';
    }else{
        $categoriaLugar = $_POST["categoriaLugar"];
        session_start();
        $query = "INSERT INTO lugar VALUES ('','$nombreLugar','$latitudLugar','$longitudLugar','$categoriaLugar','".$_SESSION['nombre_usuario']."')";
        $insert = mysqli_query($conexion,$query);
        header('location: ../');
    }
?>