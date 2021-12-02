<?php
    require("../crud/conexion.php");
    session_start();
    if(isset($_SESSION)){
        $nombre_usuario = $_SESSION['nombre_usuario'];
        $id_evento = $_GET['id'];
    }
    $sql = "INSERT INTO asiste VALUES('$nombre_usuario',$id_evento)";
    $insert = mysqli_query($conexion,$sql);
    header('location: ./ver_evento.php?seleccion='.$id_evento.'');
?>