<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
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
        $get_categoria_noticia = $row["nombre_categoria"];      
    }
?>

<!doctype html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <?php require("../header.php")?>
      <title>Editar noticia - Administrador</title>
    </head>

    <body>
      
    <?php require("../navbar.php") ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <div class="mb-3 row text-center">
                <span class="fs-2 fw-bolder">
                  EDITAR NOTICIA
                </span>
              </div>
              <!-- UPDATE -->
              <form action="Consultas/update_noticia.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" class="form-control" name="insert_nombre_usuario" value="<?php echo "$get_nombre_usuario" ?>">
                <div class="mb-3"> 
                  <label class="form-label fw-bolder" >Fecha:</label>
                  <input type="date" class="form-control" name="insert_fecha_noticia" value="<?php echo "$get_fecha_noticia" ?>"> 
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder">Título:</label>
                  <input type="text" class="form-control" name="insert_titulo_noticia" value="<?php echo "$get_titulo_noticia" ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder">Bajada:</label>
                  <textarea name="insert_bajada_noticia" class="form-control" cols="30" rows="2" maxlength="200" ><?php echo "$get_bajada_noticia" ?></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder">Lead:</label>
                  <textarea name="insert_lead_noticia" class="form-control" cols="30" rows="5" maxlength="400" ><?php echo "$get_lead_noticia" ?></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder">Cuerpo:</label>
                  <textarea name="insert_cuerpo_noticia" class="form-control" cols="30" rows="10" maxlength="10000" ><?php echo "$get_cuerpo_noticia" ?></textarea>
                </div>
                <div class="mb-3 col-sm-12 col-md-3">
                  <?php 
                      $sqlcategoria = "SELECT nombre_categoria FROM categoria_noticia";
                      $datacategoria= mysqli_query($conexion,$sqlcategoria);
                  ?>
                  <label class="form-label fw-bolder" >Categoría:</label>
                  <!--<input type="text" class="form-control" name="insert_categoria_noticia">-->
                  <select class="form-select" name="insert_categoria_noticia" >
                        <option hidden selected value= "<?php echo $get_categoria_noticia ?>"><?php echo $get_categoria_noticia ?></option>
                        <?php while($row = mysqli_fetch_assoc($datacategoria)){?>
                              <option value="<?php echo$row["nombre_categoria"]?>"><?php echo$row["nombre_categoria"]?></option>
                        <?php }?>
                  </select>
                </div>
                <div class="mb-3 col-sm-12 col-md-4">
                  <label class="form-label fw-bolder">Imágen:</label>
                  <input type="file" class="form-control" name="insert_imagen_noticia" >
                  <img class="mt-5" style="width:20%;" src="data:image/jpeg;base64,<?php echo base64_encode($get_imagen_noticia)?>" >
                </div>
                <input type="hidden" name="insert_id" value="<?php echo "$id" ?>">
                <div class="row ">
                  <div class="col-lg-6 text-end">
                    <button class="btn btn-secondary" type="submit">Editar</button>
                  </div>
                  <div class="col-lg-6 " >
                    <a href="index.php"  class="btn btn-primary" >Volver</a>
                  </div>
                </div>
              </form>
              <br>
            </div>
        </div>
      </div> 
      <?php require("../footer.php") ?>
    </body>
</html>



