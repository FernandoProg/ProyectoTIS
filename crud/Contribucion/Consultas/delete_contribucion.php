<?php
    require("../../conexion.php");

    $id_contribucion = $_GET["id"];

    $sql = "DELETE FROM contribucion WHERE id_contribucion = '$id_contribucion'"; 
    $resultado = mysqli_query($conexion, $sql);

    header('Location: ../index.php');
?>