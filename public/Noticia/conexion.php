<?php
    $conexion = mysqli_connect("localhost", "root","","proyecto_municipalidad");
    if($conexion->connect_error){
        die("Conexión fallida ". $conn->connect_error);
    }


?>
