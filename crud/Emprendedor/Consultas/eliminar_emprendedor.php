<?php
    require("../../conexion.php");
    $id=$_GET["id"];
    $sql="DELETE FROM emprendedor WHERE id_emprendedor=$id";
    $resultado = mysqli_query($conexion,$sql);
    header('location: ../');
?>