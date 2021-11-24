<?php
    require("../../conexion.php");
    $id=$_GET["seleccion"];

    $sql = "DELETE FROM noticia WHERE id_noticia=$id";
    $result = mysqli_query($conexion, $sql);

    header('Location: ../index.php');
?>