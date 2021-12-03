<?php
    require("../../conexion.php");
    session_start();
    $nombre_emprendedor= $_POST["nombre_emprendedor"];
    $direccion_emprendedor = $_POST["direccion_emprendedor"];
    $celular_emprendedor = $_POST["celular_emprendedor"];
    $telefono_emprendedor = $_POST["telefono_emprendedor"];
    $correo_emprendedor = $_POST["correo_emprendedor"];
    $rubro_emprendedor = $_POST["rubro_emprendedor"];
    $image = $_FILES['imagen_emprendedor']['tmp_name'];
    $imagen_emprendedor = addslashes(file_get_contents($image));
    $tipo_imagen = $_FILES['imagen_emprendedor']['type'];
    $facebook = (isset($_POST["facebook_emprendedor"])) ? $_POST["facebook_emprendedor"]: NULL;
    $instagram = (isset($_POST["instagram_emprendedor"])) ? $_POST["instagram_emprendedor"] .= '/': NULL;
    $informacion = $_POST["informacion"];

    $length = count($_FILES["imagenes_productos"]['name']);
    echo $length;

    $query = "INSERT INTO `emprendedor` VALUES ('','".$_SESSION['nombre_usuario']."','$nombre_emprendedor','$direccion_emprendedor','$celular_emprendedor','$telefono_emprendedor','$correo_emprendedor','$rubro_emprendedor','$imagen_emprendedor','$tipo_imagen'
    ,'$facebook','$instagram','$informacion',0)";

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


    header('location: ../index.php');
    
    
?>