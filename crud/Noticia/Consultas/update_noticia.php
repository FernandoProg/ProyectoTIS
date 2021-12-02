<?php
    require("../../conexion.php");

    $nombre_usuario = $_POST["insert_nombre_usuario"];
    $titulo_noticia = $_POST["insert_titulo_noticia"];
    $fecha_noticia = $_POST["insert_fecha_noticia"];
    $bajada_noticia = $_POST["insert_bajada_noticia"];
    $lead_noticia = $_POST["insert_lead_noticia"];
    $cuerpo_noticia = $_POST["insert_cuerpo_noticia"];
    $categoria_noticia = $_POST["insert_categoria_noticia"];
    $id = $_POST["insert_id"];
    $imagen = $_FILES['insert_imagen_noticia']['tmp_name'];

    $length = count($_FILES["imagenes_productos"]['name']);
    echo $length;

    session_start();
    /*
    if($imagen){
        $imagen_noticia = addslashes(file_get_contents($imagen));
        $sql = "UPDATE noticia SET nombre_usuario='".$_SESSION['nombre_usuario']."', titulo_noticia='$titulo_noticia', fecha_noticia='$fecha_noticia', bajada_noticia='$bajada_noticia', lead_noticia='$lead_noticia', cuerpo_noticia='$cuerpo_noticia', nombre_categoria='$categoria_noticia', imagen_noticia='$imagen_noticia' WHERE id_noticia =$id";
        if(){

        }
    }else{
        $sql = "UPDATE noticia SET nombre_usuario='".$_SESSION['nombre_usuario']."', titulo_noticia='$titulo_noticia', fecha_noticia='$fecha_noticia', bajada_noticia='$bajada_noticia', lead_noticia='$lead_noticia', cuerpo_noticia='$cuerpo_noticia', nombre_categoria='$categoria_noticia' WHERE id_noticia =$id";
    }
    
    if($length>5){
        echo'<script>
        alert("No se pueden ingresar mas de 5 imagenes");
        window.location.href = "../index.php";
        </script>';
    }else if($_FILES["imagenes_productos"]['name'][0]){
        $ingreso = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $id= mysqli_insert_id($conexion);   
        for($i=0 ; $i<$length ;$i++){
            $imagen_producto = addslashes(file_get_contents($_FILES["imagenes_productos"]['tmp_name'][$i]));
            $tipo_imagen = $_FILES["imagenes_productos"]['type'][$i];
            $query_image = "INSERT INTO imagen_producto VALUES('','$id','$imagen_producto')";
            $consulta = mysqli_query($conexion,$query_image);
        }        
    }else{
        $ingreso = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
    }

    $result = mysqli_query($conexion, $sql);
    header('Location: ../index.php');*/
?>