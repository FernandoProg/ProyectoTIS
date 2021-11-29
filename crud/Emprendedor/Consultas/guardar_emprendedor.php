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
    $facebook = $_POST["facebook"];
    $instagram = $_POST["instagram"];
    $descripcion = $_POST["descripcion"];

    $query = "INSERT INTO `emprendedor` VALUES ('','".$_SESSION['nombre_usuario']."','$nombre_emprendedor','$direccion_emprendedor','$celular_emprendedor','$telefono_emprendedor','$correo_emprendedor','$rubro_emprendedor','$imagen_emprendedor','$tipo_imagen','$facebook','$instagram','$descripcion')";
    $resultado = mysqli_query($conexion,$query);
    header('location: ../index.php');
?>