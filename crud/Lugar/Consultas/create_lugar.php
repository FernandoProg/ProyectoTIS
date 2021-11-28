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
        $query = "INSERT INTO lugar VALUES ('','".$_SESSION['nombre_usuario']."','$latitudLugar','$longitudLugar','$categoriaLugar', '$nombreLugar')";
        $insert = mysqli_query($conexion,$query);
        header('location: ../');
    }
?>