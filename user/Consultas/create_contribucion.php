<?php
    require("conexion.php");
    $nombre_contribucion = $_POST["nombre_contribucion"];
    $correo_contribucion = $_POST["correo_contribucion"];
    $descripcion_contribucion = $_POST["descripcion_contribucion"];
    $departamento = $_POST["departamento"];
    $fecha = date("Y,m,d");

    $sql = "INSERT INTO contribucion (id_contribucion, nombre_contribucion, correo_contribucion, descripcion_contribucion, departamento, fecha) VALUES ('', '$nombre_contribucion', '$correo_contribucion', '$descripcion_contribucion', '$departamento', '$fecha')";
    $resultado = mysqli_query($conexion, $sql);
    header('Location: ../ingreso_contribucion.php');
?>