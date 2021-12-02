<?php
    require("../../conexion.php");
    $nombre_categoria = $_POST["insert_categoria_noticia"];
    session_start();
    $sql = "INSERT INTO categoria_noticia (nombre_categoria, nombre_usuario)
    VALUES ('$nombre_categoria','".$_SESSION['nombre_usuario']."')";

    $result = mysqli_query($conexion, $sql);
    header('Location: ../insertar_categoria.php');
?>
