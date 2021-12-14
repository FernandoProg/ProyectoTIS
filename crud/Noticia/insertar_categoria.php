<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    

<!doctype html>
  <html lang="es">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous">
      </script>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
              <br>
              <!-- INSERT -->
              <form action="Consultas/insert_categoria.php" enctype="multipart/form-data" method="POST">
                <div class="mb-3 col-3">
                  <label class="form-label fw-bolder" >Nombre categoria:</label>
                  <input type="text" class="form-control" name="insert_categoria_noticia" maxlength="100" placeholder="Cultural" required>
                </div>
                <div class="mt-4">
                  <button class="btn btn-secondary" type="submit">Guardar</button>
                </div>
            </div>

            <div class="col-lg-12 mt-5">
              <div class="mb-4 text-center">
                <h5>CATEGORIAS INGRESADAS</h5>
              </div>
              <div class="table-responsive ">
                <table class="table table-hover table-bordered table-light" id="myTable">
                  <thead  class="table-dark">
                    <tr>
                      <th scope="col">Categoria</th>
                      <th style="width: 100px" scope="col">Usuario </th>
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
                            </a>
                            <a style="text-decoration: none;" href='Consultas/delete_categoria.php?seleccion=<?php echo $get_nombre_categoria ?>'>
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
              <div class="col-lg-12 " >
                    <a href="index.php"  class="btn btn-primary" >Volver</a>
                </div>
              
            </div>
        </div>
      </div> 
      <script>
        $(document).ready( function () {
        $('#myTable').DataTable({
            "zeroRecords":    "No matching records found",
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],


        });
        console.log("k pasa");
        } );
        </script>
      <?php require("../footer.php") ?>
    </body>
</html>