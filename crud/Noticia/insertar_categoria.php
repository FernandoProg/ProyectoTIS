<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    

<!doctype html>
  <html lang="es">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <?php require("../header.php")?>
      <title>Noticias - Categorias</title>
    </head>

    <body>
      <?php require("../navbar.php") ?>
      
      <div class="container">
        <div class="row">
            <div class="col-lg-12"> 
              <div class="mb-3 text-center">
                <span class="fs-2 fw-bolder">
                  INGRESAR CATEGORIA NOTICIA
                </span>
              </div>
              <div class="mb-3 text-center">
                <a href="insertar_categoria.php">ingresar categoria</a>
              </div>
              <br>
              <!-- INSERT -->
              <form action="Consultas/insert_noticia.php" enctype="multipart/form-data" method="POST">
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Nombre_categoria:</label>
                  <input type="text" class="form-control" name="insert_titulo_noticia" maxlength="100" placeholder="Cultural" required>
                </div>
            </div>

            <div class="col-lg-12 mt-5">
              <div class="mb-4 text-center">
                <h5>Noticias ingresadas</h5>
              </div>
              <div class="table-responsive ">
                <table class="table table-hover table-bordered table-light">
                  <thead  class="table-dark">
                    <tr>
                      <th scope="col">Ususario</th>
                      <th style="width: 100px" scope="col">Categoria noticia </th>
                      <th style="width: 100px;" scope="col" >Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- GET -->
                    <?php
                      $consulta = "SELECT * FROM categoria_noticia";
                      $resultado = mysqli_query($conexion, $consulta);

                      while($row = mysqli_fetch_assoc($resultado)){
                        $get_nombre_categoria = $row["nombre_categoria"];
                        $get_nombre_usuario = $row["nombre_usuario"];
                        ?>
                        <tr>
                          <td> <?php echo $get_nombre_categoria ?></td>
                          <td> <?php echo $get_nombre_usuario ?></td>
                          <td >
                            <a style="text-decoration: none;" href='Consultas/delete_noticia.php?seleccion=<?php echo $id ?>'>
                              <span class="material-icons" style="color: red;">
                                delete
                              </span>
                            </a>
                            
                          </td>
                        <?php
                        echo "</tr>";              
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              
            </div>
        </div>
      </div> 
      <?php require("../footer.php") ?>
    </body>
</html>