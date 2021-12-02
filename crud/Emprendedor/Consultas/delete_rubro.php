<?php
    require("../../conexion.php");
    $rubro=$_GET["seleccion"];

    $sql = "DELETE FROM rubro_emprendedor WHERE nombre_rubro='$rubro'";
    echo $sql;
    $result = mysqli_query($conexion, $sql); 
    header('Location: ../insertar_rubro.php');
?>