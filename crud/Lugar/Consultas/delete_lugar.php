<?php
    require("../../conexion.php");

    $id= $_GET["id"];

    $sql = "DELETE FROM lugar WHERE id_lugar = $id";
    $consulta = mysqli_query($conexion,$sql);

    header('location: ../');
    
?>