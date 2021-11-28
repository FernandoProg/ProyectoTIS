<?php
    require("conexion.php");
    session_start();
    $nombre_contribucion = $_POST["nombre_contribucion"];
    $descripcion_contribucion = $_POST["descripcion_contribucion"];
    $departamento = $_POST["departamento"];
    $fecha = date("Y,m,d");

    $sql = "INSERT INTO contribucion (id_contribucion, nombre_contribucion, nombre_usuario, descripcion_contribucion, departamento, fecha) VALUES ('', '$nombre_contribucion', '".$_SESSION['nombre_usuario']."', '$descripcion_contribucion', '$departamento', '$fecha')";
    $resultado = mysqli_query($conexion, $sql);

    header('Location: ../ingreso_contribucion.php');
?>