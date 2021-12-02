<?php
    require("../crud/conexion.php");
    session_start();
    $id = $_GET["id"];
    $nombre_usuario = $_SESSION['nombre_usuario'];
    echo $id,$nombre_usuario;
    $sql = "DELETE FROM asiste WHERE id_evento=$id AND nombre_usuario = '$nombre_usuario'";
    $removeAsist = mysqli_query($conexion,$sql);
    header('location: ver_evento.php?seleccion='.$id.'');
?>