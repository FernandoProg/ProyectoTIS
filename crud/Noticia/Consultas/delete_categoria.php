<?php
    require("../../conexion.php");
    $categoria=$_GET["seleccion"];
    echo $categoria;

    $sql = "DELETE FROM categoria_noticia WHERE nombre_categoria='$categoria'";
    echo $sql;
    $result = mysqli_query($conexion, $sql); 
    header('Location: ../insertar_categoria.php');
?>