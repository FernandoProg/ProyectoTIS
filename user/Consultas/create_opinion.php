<?php
    require('conexion.php');
    session_start();
    $nombre_opinion = $_POST["nombre_opinion"];
    $descripcion_opinion = $_POST["descripcion_opinion"];
    $length = count($_FILES["imagenes_opinion"]['name']);
    $fecha = date("Y,m,d");
    $query= "INSERT INTO opinion VALUES ('','$nombre_opinion','".$_SESSION['nombre_usuario']."','$descripcion_opinion','$fecha')";
    if($length>5){
        echo'<script>
        alert("No se pueden ingresar mas de 5 imagenes");
        window.location.href = "../ingreso_opinion.php";
        </script>';
    }else{
        $ingreso = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $id= mysqli_insert_id($conexion);   
        for($i=0 ; $i<$length ;$i++){
            $imagen_opinion = addslashes(file_get_contents($_FILES["imagenes_opinion"]['tmp_name'][$i]));
            $tipo_imagen = $_FILES["imagenes_opinion"]['type'][$i];
            $query_image = "INSERT INTO imagen_opinion VALUES('','$id','$imagen_opinion','$tipo_imagen')";
            $consulta = mysqli_query($conexion,$query_image);
        }
        header('location: ../ingreso_opinion.php');
    }
?>