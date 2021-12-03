<?php
    require("../../conexion.php");
    $nombre_rubro = $_POST["insert_rubro_emprendedor"];
    session_start();
    $sql = "INSERT INTO  rubro_emprendedor (nombre_rubro, nombre_usuario)
    VALUES ('$nombre_rubro','".$_SESSION['nombre_usuario']."')";

    $result = mysqli_query($conexion, $sql);
    header('Location: ../insertar_rubro.php');
?>
