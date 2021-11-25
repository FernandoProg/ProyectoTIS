<?php
    require("../../conexion.php");


    $nombre_admin = $_POST["insert_nombre_admin"];
    $titulo_noticia = $_POST["insert_titulo_noticia"];
    $fecha_noticia = $_POST["insert_fecha_noticia"];
    $bajada_noticia = $_POST["insert_bajada_noticia"];
    $lead_noticia = $_POST["insert_lead_noticia"];
    $cuerpo_noticia = $_POST["insert_cuerpo_noticia"]; 
    $categoria_noticia = $_POST["insert_categoria_noticia"];
    //$imagen_noticia = $_POST["insert_imagen_noticia"];

    $imagen_noticia = addslashes(file_get_contents($_FILES['insert_imagen_noticia']['tmp_name']));


    $sql = "INSERT INTO noticia (nombre_admin, titulo_noticia, fecha_noticia, bajada_noticia, lead_noticia, cuerpo_noticia, categoria_noticia, imagen_noticia) 

    VALUES ('$nombre_admin','$titulo_noticia','$fecha_noticia','$bajada_noticia','$lead_noticia','$cuerpo_noticia','$categoria_noticia','$imagen_noticia')";
    $result = mysqli_query($conexion, $sql);

    header('Location: ../index.php');
?>
