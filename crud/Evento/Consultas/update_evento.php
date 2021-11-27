<?php
    require("../../conexion.php");

    $id = $_POST["id"];
    $idLugar =$_POST["idLugar"];
    $nombreEvento =$_POST["nombreEvento"];
    $fechaEvento =$_POST["fechaEvento"];
    $imagenEvento = addslashes(file_get_contents($_FILES['imagenEvento']['tmp_name']));
    $descripcionEvento = $_POST["descripcionEvento"];
    
    if($imagenEvento){
        $sql = "UPDATE evento SET id_lugar='$idLugar',nombre_evento='$nombreEvento',fecha_evento='$fechaEvento',imagen_evento='$imagenEvento',descripcion_evento='$descripcionEvento' WHERE id_evento=$id";
    }else{
        $sql = "UPDATE evento SET id_lugar='$idLugar',nombre_evento='$nombreEvento',fecha_evento='$fechaEvento',descripcion_evento='$descripcionEvento' WHERE id_evento=$id";
    }
    
    $consulta = mysqli_query($conexion,$sql);

    header('location: ../');        
?>