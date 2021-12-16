<?php
    require("../../conexion.php");

    session_start();
    $idLugar = $_POST["idLugar"];
    $nombreEvento = $_POST["nombreEvento"];
    $fechaEvento = $_POST["fechaEvento"];
    $imagenEvento = addslashes(file_get_contents($_FILES['imagenEvento']['tmp_name']));
    $descripcionEvento = $_POST["descripcionEvento"];

    $sql = "INSERT INTO evento VALUES ('','".$_SESSION['nombre_usuario']."','$idLugar','$nombreEvento','$fechaEvento','$imagenEvento','$descripcionEvento','')";

    $insert = mysqli_query($conexion,$sql);

    header('location: ../');

?>