<?php
    require("../../crud/conexion.php");
    session_start(); 
    if(isset($_SESSION)){
        $id = $_GET['id']; 
        $nombre_usuario = $_SESSION['nombre_usuario'];
    } 
    $sql = "DELETE FROM me_gusta WHERE id_noticia=$id AND nombre_usuario ='$nombre_usuario'";
    $removeLike = mysqli_query($conexion,$sql);
    header('location: ../ver_noticia.php?seleccion='.$id.'');
?>