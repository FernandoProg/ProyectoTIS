<?php
    require("../../crud/conexion.php");
    session_start();
    if(isset($_SESSION)){
        $id = $_GET['id'];
        $nombre_noticia = $_SESSION['nombre_usuario'];
    }
    $sql = "INSERT INTO me_gusta VALUES('$nombre_noticia',$id)";
    $insert = mysqli_query($conexion,$sql);
    header('location: ../ver_noticia.php?seleccion='.$id.'');    

?>