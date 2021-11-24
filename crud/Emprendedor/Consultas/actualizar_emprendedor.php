<?php
require("../../conexion.php");
    $id = $_POST["id_emprendedor"];
    $nombre_emprendedor= $_POST["nombre_emprendedor"];
    $direccion_emprendedor = $_POST["direccion_emprendedor"];
    $celular_emprendedor = $_POST["celular_emprendedor"];
    $telefono_emprendedor = $_POST["telefono_emprendedor"];
    $correo_emprendedor = $_POST["correo_emprendedor"];
    $rubro_emprendedor = $_POST["rubro_emprendedor"];
    $image = $_FILES['imagen_emprendedor']['tmp_name'];
    $tipo_imagen = $_FILES['imagen_emprendedor']['type'];
    $imagen_emprendedor = addslashes(file_get_contents($image));


    if($imagen_emprendedor){
        $sql = "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
        telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor',imagen_emprendedor='$imagen_emprendedor',
        tipo_imagen='$tipo_imagen' WHERE id_emprendedor=$id";
    }else{
        $sql = "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
        telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor', tipo_imagen='$tipo_imagen' WHERE id_emprendedor=$id";
    }

    $query = mysqli_query($conexion,$sql);
    header('location: ../index.php');