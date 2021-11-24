<?php
    require("../../conexion.php");
    $id=$_GET["id"];
    $sql="DELETE FROM opinion WHERE id_opinion=$id";
    $resultado = mysqli_query($conexion,$sql);
    header('location: ../');