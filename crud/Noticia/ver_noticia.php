<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth.php");
    $id=$_GET["seleccion"];
    $consulta = "SELECT * FROM noticia WHERE id_noticia = $id";
    $resultado = mysqli_query($conexion, $consulta);

    while($row = mysqli_fetch_assoc($resultado)){
        $get_nombre_usuario = $row["nombre_usuario"];
        $get_titulo_noticia = $row["titulo_noticia"];
        $get_fecha_noticia = $row["fecha_noticia"];
        $get_lead_noticia = $row["lead_noticia"];
        $get_bajada_noticia = $row["bajada_noticia"];
        $get_cuerpo_noticia = $row["cuerpo_noticia"];
        $get_imagen_noticia = $row["imagen_noticia"];
        $get_categoria_noticia = $row["categoria_noticia"];    
    }
?>

<!doctype html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <?php require("../header.php")?>
      <title>Municipalidad</title>
    </head>

    <body>   
        <?php require("../navbar.php") ?>  

        <div class="container">
            <div class="row col-lg-12">
                <!-- TITULO -->
                <div class="row col-lg-12">
                    <span class="fs-1 fw-bolder text-center"><?php echo $get_titulo_noticia ?></span>
                </div>
                <!-- Bajada -->
                <div class="row col-lg-12 pt-3">
                    <span class="fs-5  text-center"><?php echo $get_bajada_noticia ?></span>
                </div>
                <!-- Fecha -->
                <div class="row col-lg-12">
                    <span class="fs-5  text-left    ">Fecha: <?php echo $get_fecha_noticia ?></span>
                </div>
                
                <div class="row">
                    <!-- IMAGEN -->
                    <div class="col-lg-3 col-sm-12  "> 
                        <img class="mt-5" style="width:250px;" src="data:image/jpeg;base64,<?php echo base64_encode($get_imagen_noticia)?>" >
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <!-- Lead -->
                        <div class="col-lg-12 pt-3" >
                            <span class="fs-5 text-justify d-flex " style="text-align: justify;"><?php echo $get_lead_noticia ?></span>
                        </div>
                        <!-- CUERPO -->
                        <div class="col-lg-12 pt-3  ">
                            <span class="fs-5 text-justify d-flex " style="text-align: justify;"class="fs-5 text-justify d-flex " style="text-align: justify;"><?php echo $get_cuerpo_noticia ?></span>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <span> Categoría: <?php echo $get_categoria_noticia ?></span>
                </div>

                <div class="row">
                    <div class="col-lg-6 text-end">
                        <a href='Consultas/delete_noticia.php?seleccion=<?php echo $id ?>' class="btn btn-danger">Eliminar</a>
                    </div>
                    <div class="col-lg-6 ">
                        <a href="index.php"  class="btn btn-primary" >Volver</a>
                    </div>
                </div>
                
            </div>
        </div>
   
    </body>
</html>


