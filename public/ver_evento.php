<?php
    require("../crud/conexion.php");
    //include("../../sesion_usuarios/auth_admin.php");
    $id=$_GET["seleccion"];
    $consulta = "SELECT nombre_evento,fecha_evento,imagen_evento,descripcion_evento,nombre_lugar FROM evento join lugar using(id_lugar) WHERE id_evento = $id";
    $resultado = mysqli_query($conexion, $consulta);
    $visita = "UPDATE evento SET visitas_evento = visitas_evento +1 WHERE id_evento = $id";
    $sumarVisita = mysqli_query($conexion, $visita);
    $sqlAsist = "SELECT COUNT(nombre_usuario) asist FROM asiste WHERE id_evento = $id";
    $asist = mysqli_query($conexion,$sqlAsist);
    $numAsist = mysqli_fetch_assoc($asist);
    while($row = mysqli_fetch_assoc($resultado)){
        $nombreEvento = $row["nombre_evento"];
        $fechaEvento = $row["fecha_evento"];
        $imagenEvento = $row["imagen_evento"];
        $descripcionEvento = $row["descripcion_evento"];
        $nombreLugar = $row["nombre_lugar"];
    }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- navbar -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- /navbar -->
    <meta charset="utf-8" />
    <?php require("../user/head.php")?>
    <title>Ver más - Evento</title>
    <script
    src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
     integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous">
    </script>
    <script src="asist.js"></script>
  </head>

  <body>
    <?php require("navbar_user.php");?>

    <div class="container mb-5 mt-4">
      <div class="row col-lg-12">
        <!-- TITULO -->
        <div class="row col-lg-12">
          <span class="fs-1 fw-bolder text-center"
            ><?php echo $nombreEvento ?></span
          >
        </div>
        <!-- Fecha -->
        <div class="row col-lg-12 mt-2">
          <span class="fs-5 text-left"
            >Fecha de realización:
            <?php echo $fechaEvento ?></span
          >
        </div>

        <div class="row">
          <!-- IMAGEN -->
          <div class="col-lg-5 col-sm-12">
            <img
              class="mt-5 shadow"
              style="width: 100%"
              src="data:image/jpeg;base64,<?php echo base64_encode($imagenEvento)?>"
            />
          </div>
          <div class="col-lg-7 col-sm-12">
            <!-- Lead -->
            <div class="col-lg-12 pt-3">
              <span class="fs-5 text-justify d-flex" style="text-align: justify"
                ><?php echo $nombreLugar ?></span
              >
            </div>
            <!-- CUERPO -->
            <div class="col-lg-12 pt-3">
              <span
                class="fs-5 text-justify d-flex"
                style="text-align: justify"
                class="fs-5 text-justify d-flex"
                style="text-align: justify"
                ><?php echo $descripcionEvento ?></span
              >
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-6 text-lg-end text-sm-center col-md-12 p-2">
            <div class="">
              <span class="fs-3 align-bottom material-icons"> people </span>
              <span class="fs-5  fw-bolder">
                Asistencias:
                <?php echo$numAsist["asist"]?>
              </span>
            </div>
          </div>
          <div class="col-lg-6 text-lg-start text-sm-center col-md-12">
            <?php
              if($_SESSION){
                $nombre_usuario = $_SESSION['nombre_usuario'];
                $asiste = "SELECT * FROM asiste WHERE nombre_usuario ='$nombre_usuario' AND id_evento = $id";
                $flag = mysqli_query($conexion,$asiste);
                if(mysqli_num_rows($flag)>0){
            ?>  <div id="asist" class="d-inline-flex w-auto">
                  <input type="hidden" id="seleccion" value="<?php echo$id?>">
                  <span class="bg-success text-white p-2 align-middle rounded">
                      Asistencia registrada
                  </span>
                </div>
                <?php }else{?>
                  <span class="">
                    <a  class="btn btn-secondary" href="./consultas/asistencia.php?id=<?php echo$id?>">Marcar Asistencia</a>
                  </span>
                <?php }?>
            <?php }else{?>
              <span>
                <a class="btn btn-danger" href="../acceso_usuarios.php">Iniciar Sesión para registrar asistencia</a>
              </span>  
            <?php }?>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 text-center">
            <a href="view_eventos.php" class="btn btn-primary">Volver</a>
          </div>
        </div>
      </div>
    </div>
    <?php require("../footer.php"); ?>
  </body>
</html>
