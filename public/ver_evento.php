<?php
    require("../crud/conexion.php");
    //include("../../sesion_usuarios/auth_admin.php");
    $id=$_GET["seleccion"];
    $consulta = "SELECT nombre_evento,fecha_evento,imagen_evento,descripcion_evento,nombre_lugar FROM evento join lugar using(id_lugar) WHERE id_evento = $id";
    $resultado = mysqli_query($conexion, $consulta);

    while($row = mysqli_fetch_assoc($resultado)){
        $nombreEvento = $row["nombre_evento"];
        $fechaEvento = $row["fecha_evento"];
        $imagenEvento = $row["imagen_evento"];
        $descripcionEvento = $row["descripcion_evento"];
        $nombreLugar = $row["nombre_lugar"];
    }
?>

<!doctype html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <?php require("../user/head.php")?>
      <title>Municipalidad</title>
    </head>

    <body>   
        <?php require("navbar_user.php");?>  

        <div class="container">
            <div class="row col-lg-12">
                <!-- TITULO -->
                <div class="row col-lg-12">
                    <span class="fs-1 fw-bolder text-center"><?php echo $nombreEvento ?></span>
                </div>
                <!-- Fecha -->
                <div class="row col-lg-12">
                    <span class="fs-5  text-left ">Fecha: <?php echo $fechaEvento ?></span>
                </div>
                
                <div class="row">
                    <!-- IMAGEN -->
                    <div class="col-lg-5 col-sm-12  "> 
                        <img class="mt-5" style="width:100%;" src="data:image/jpeg;base64,<?php echo base64_encode($imagenEvento)?>" >
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <!-- Lead -->
                        <div class="col-lg-12 pt-3" >
                            <span class="fs-5 text-justify d-flex " style="text-align: justify;"><?php echo $nombreLugar ?></span>
                        </div>
                        <!-- CUERPO -->
                        <div class="col-lg-12 pt-3  ">
                            <span class="fs-5 text-justify d-flex " style="text-align: justify;"class="fs-5 text-justify d-flex " style="text-align: justify;"><?php echo $descripcionEvento ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="view_eventos.php"  class="btn btn-primary" >Volver</a>
                    </div>
                </div>
                
            </div>
        </div>
   
    </body>
</html>



