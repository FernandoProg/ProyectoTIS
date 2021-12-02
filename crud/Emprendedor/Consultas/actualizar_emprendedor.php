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
    $length = count($_FILES["imagenes_productos"]['name']);
 

    if($_FILES["imagenes_productos"]['name'][0]){

        $sqlborrar = "DELETE FROM imagen_producto WHERE id_emprendedor = $id";
        $borrar = mysqli_query($conexion,$sqlborrar);

        if($image){
            $imagen_emprendedor = addslashes(file_get_contents($image));
            $query= "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
            telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor',imagen_emprendedor='$imagen_emprendedor',
            tipo_imagen='$tipo_imagen',facebook='$facebook',instagram='$instagram',informacion='$informacion' WHERE id_emprendedor=$id";
        }else{
            $query = "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
            telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor', tipo_imagen='$tipo_imagen'
            ,facebook='$facebook',instagram='$instagram',informacion='$informacion' WHERE id_emprendedor=$id";
        }

        if($length>5){
            echo'<script>
            alert("No se pueden ingresar mas de 5 imagenes");
            window.location.href = "../index.php";
            </script>';
        }else if($_FILES["imagenes_productos"]['name'][0]){
            $ingreso = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
             
            for($i=0 ; $i<$length ;$i++){
                echo $i;
                $imagen_producto = addslashes(file_get_contents($_FILES["imagenes_productos"]['tmp_name'][$i]));
                $tipo_imagen = $_FILES["imagenes_productos"]['type'][$i];
                $query_image = "INSERT INTO imagen_producto VALUES('','$id','$imagen_producto')";
                $consulta = mysqli_query($conexion,$query_image);
            }       
        }else{
            $ingreso = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        }
        
    }else{
        if($image){
            echo "entre";
            $imagen_emprendedor = addslashes(file_get_contents($image));
            $sql = "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
            telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor',imagen_emprendedor='$imagen_emprendedor',
            tipo_imagen='$tipo_imagen',facebook='$facebook',instagram='$instagram',informacion='$informacion' WHERE id_emprendedor=$id";
            
            $query = mysqli_query($conexion,$sql);
        }else{
            $sql = "UPDATE  emprendedor SET nombre_emprendedor ='$nombre_emprendedor', direccion_emprendedor='$direccion_emprendedor', celular_emprendedor='$celular_emprendedor',
            telefono_emprendedor='$telefono_emprendedor',correo_emprendedor='$correo_emprendedor',rubro_emprendedor='$rubro_emprendedor'
            ,facebook='$facebook',instagram='$instagram',informacion='$informacion' WHERE id_emprendedor=$id";
            $query = mysqli_query($conexion,$sql);
        }
    }
    
    
    

    
        header('location: ../index.php');
 
    ?>