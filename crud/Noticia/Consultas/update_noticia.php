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

    session_start();

    if($imagen){
        $imagen_noticia = addslashes(file_get_contents($imagen));
        $sql = "UPDATE noticia SET nombre_usuario='".$_SESSION['nombre_usuario']."', titulo_noticia='$titulo_noticia', fecha_noticia='$fecha_noticia', bajada_noticia='$bajada_noticia', lead_noticia='$lead_noticia', cuerpo_noticia='$cuerpo_noticia', categoria_noticia='$categoria_noticia', imagen_noticia='$imagen_noticia' WHERE id_noticia =$id";
        $result = mysqli_query($conexion, $sql);
    }else{
        $sql = "UPDATE noticia SET nombre_usuario='".$_SESSION['nombre_usuario']."', titulo_noticia='$titulo_noticia', fecha_noticia='$fecha_noticia', bajada_noticia='$bajada_noticia', lead_noticia='$lead_noticia', cuerpo_noticia='$cuerpo_noticia', categoria_noticia='$categoria_noticia' WHERE id_noticia =$id";
        $result = mysqli_query($conexion, $sql);
    }

    header('Location: ../index.php');
?>