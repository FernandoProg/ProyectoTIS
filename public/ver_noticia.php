<?php
    require("../crud/conexion.php");
    //include("../../sesion_usuarios/auth_admin.php");
    $id=$_GET["seleccion"];
    $consulta = "SELECT * FROM noticia WHERE id_noticia = $id";
    $resultado = mysqli_query($conexion, $consulta);
    $visita = "UPDATE noticia SET visitas_noticia = visitas_noticia+1 WHERE id_noticia = $id";
    $sumarVisita = mysqli_query($conexion, $visita);
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

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <?php require("../user/head.php")?>
    <title>Ver más - Noticia</title>
  </head>

  <body>
    <?php require("navbar_user.php");?>

    <div class="container mb-5">
      <div class="row col-lg-12">
        <!-- TITULO -->
        <div class="row col-lg-12">
          <span class="fs-1 fw-bolder text-center"
            ><?php echo $get_titulo_noticia ?></span
          >
        </div>
        <!-- Bajada -->
        <div class="row col-lg-12 pt-3">
          <span class="fs-5 text-center"
            ><?php echo $get_bajada_noticia ?></span
          >
        </div>
        <!-- Fecha -->
        <div class="row col-lg-12 mb-4">
          <span class="fs-5 text-left"
            >Fecha:
            <?php echo $get_fecha_noticia ?></span
          >
        </div>
        <!-- IMAGEN -->
        <div class="col-lg-12 col-sm-12">
          <img
            class=""
            style="width: 100%"
            src="data:image/jpeg;base64,<?php echo base64_encode($get_imagen_noticia)?>"
          />
        </div>
        <!-- Lead -->
        <div class="col-lg-12 pt-3 text-center">
          <span class="fs-5 text-justify d-flex" style="text-align: justify"
            ><?php echo $get_lead_noticia ?></span
          >
        </div>
        <!-- CUERPO -->
        <div class="col-lg-12 pt-3">
          <span
            class="fs-5 text-justify d-flex"
            style="text-align: justify"
            class="fs-5 text-justify d-flex"
            style="text-align: justify"
            ><?php echo $get_cuerpo_noticia ?></span
          >
        </div>

        <div class="text-end">
          <span>
            Categoría:
            <?php echo $get_categoria_noticia ?></span
          >
        </div>

        <div class="row">
          <div class="col-lg-6 text-end">
            <a href="view_noticias.php" class="btn btn-primary">Volver</a>
          </div>
          <div class="col-lg-6">
            <?php
              if($_SESSION){
                $nombre_usuario = $_SESSION['nombre_usuario'];
                $meGusta = "SELECT * FROM me_gusta  WHERE nombre_usuario='$nombre_usuario' AND id_noticia = $id";
                $flag = mysqli_query($conexion,$meGusta);
                if(mysqli_num_rows($flag)>0){
            ?>
              <a href="./consultas/remove_like.php?id=<?php echo$id?>">
                <span class="align-middle fs-2 material-icons">
                  thumb_up
                </span>
              </a>
              <?php }else{?>
              <a href="./consultas/me_gusta.php?id=<?php echo$id?>">
                <span class="material-icons fs-2 align-middle text-secondary">
                  thumb_up
                </span>
              </a>
              <?php }?>
            <?php }else{?>
            <span>
              <a class="btn btn-danger" href="../acceso_usuarios.php">Inicia Sesión para dejar tu Me gusta </a>
            </span>
            <?php }?>  
          </div>
        </div>
      </div>
    </div>
    <?php require("../footer.php"); ?>
  </body>
</html>
