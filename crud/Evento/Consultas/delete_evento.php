<?php
    require("../../conexion.php");
    $id = $_GET["id"];

    $sql = "DELETE FROM evento WHERE id_evento = $id";
    $consulta = mysqli_query($conexion,$sql);

    header('location: ../');
?>