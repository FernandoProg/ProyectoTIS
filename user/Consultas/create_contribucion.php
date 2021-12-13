<?php
    require("conexion.php");
    session_start();
    $nombre_contribucion = $_POST["nombre_contribucion"];
    $descripcion_contribucion = $_POST["descripcion_contribucion"];
    $departamento = $_POST["departamento"];
    $fecha = date("Y,m,d");
    $length = count($_FILES["imagenes_contribucion"]['name']);
    
    $query= "INSERT INTO contribucion VALUES ('', '$nombre_contribucion', '".$_SESSION['nombre_usuario']."', '$descripcion_contribucion', '$departamento', '$fecha')";
    if($length>5){
        echo'<script>
        alert("No se pueden ingresar mas de 5 imagenes");
        window.location.href = "../ingreso_opinion.php";
        </script>';
    }else if($_FILES["imagenes_contribucion"]['name'][0]){
        $ingreso = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $id= mysqli_insert_id($conexion);   
        for($i=0 ; $i<$length ;$i++){
            $imagen_contribucion = addslashes(file_get_contents($_FILES["imagenes_contribucion"]['tmp_name'][$i]));
            $tipo_imagen = $_FILES["imagenes_contribucion"]['type'][$i];
            $query_image = "INSERT INTO imagen_contribucion VALUES('','$id','$imagen_contribucion')";
            $consulta = mysqli_query($conexion,$query_image);
        }        
    }else{
        $ingreso = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
    }
    header('location: ../ingreso_contribucion.php');
?>