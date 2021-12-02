<?php
require("../../conexion.php");
    $id = $_POST["id_emprendedor"];
    $nombre_emprendedor= $_POST["nombre_emprendedor"];
    $direccion_emprendedor = $_POST["direccion_emprendedor"];
    $celular_emprendedor = $_POST["celular_emprendedor"];
    $telefono_emprendedor = $_POST["telefono_emprendedor"];
    $correo_emprendedor = $_POST["correo_emprendedor"];
    $rubro_emprendedor = $_POST["rubro_emprendedor"];
    $facebook = (isset($_POST["facebook_emprendedor"])) ? $_POST["facebook_emprendedor"]: NULL;
    $instagram = (isset($_POST["instagram_emprendedor"])) ? $_POST["instagram_emprendedor"]: NULL;
    $informacion = $_POST["informacion"];
    $image = $_FILES['imagen_emprendedor']['tmp_name'];
    $tipo_imagen = $_FILES['imagen_emprendedor']['type'];
    echo $nombre_emprendedor;
    $length = count($_FILES["imagenes_productos"]['name']);
    echo $length;

    if(isset($_FILES["imagenes_productos"])){
        echo "si";
    }else{
        echo "no";
    }
    
    /*
    if($tipo_imagen){
        $imagen_emprendedor = addslashes(file_get_contents($image));
        $sql = "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
        telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor',imagen_emprendedor='$imagen_emprendedor',
        tipo_imagen='$tipo_imagen',facebook='$facebook',instagram='$instagram',informacion='$informacion' WHERE id_emprendedor=$id";
        if(){

        }
    }else{
        $sql = "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
        telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor', tipo_imagen='$tipo_imagen'
        ,facebook='$facebook',instagram='$instagram',informacion='$informacion' WHERE id_emprendedor=$id";
    }

    $query = mysqli_query($conexion,$sql);
    header('location: ../index.php');*/
 
    ?>