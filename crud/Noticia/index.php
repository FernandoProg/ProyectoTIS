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
      <title>Noticias - Administrador</title>
      <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous">
        </script>
    <title>Eventos - Administrador</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    </head>

    <body>
      <?php require("../navbar.php") ?>
      
      <div class="container">
        <div class="row">
            <div class="col-lg-12"> 
              <div class="mb-3 text-center">
                <span class="fs-2 fw-bolder">
                  INGRESAR NOTICIA
                </span>
              </div>
              <br>
              <!-- INSERT -->
              <form action="Consultas/insert_noticia.php" enctype="multipart/form-data" method="POST">
                <div class="mb-3">
                  <label class="form-label fw-bolder">Fecha:</label>
                  <input type="date" class="form-control" name="insert_fecha_noticia" required>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Título:</label>
                  <input type="text" class="form-control" name="insert_titulo_noticia" maxlength="100" placeholder="Elecciones presidenciales 2021" required>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Bajada:</label>
                  <!--<input type="text" class="form-control" name="insert_bajada_noticia">-->
                  <textarea name="insert_bajada_noticia" class="form-control" cols="30" rows="2" maxlength="200" 
                  placeholder="Este domingo se llevó a cabo la primera vuelta de las Elecciones Presidenciales, instancia en la que avanzaron Kast y Boric. ¿Cuánta gente sufragó?" 
                  required ></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Lead:</label>
                  <!--<input type="text" class="form-control" name="insert_lead_noticia">-->
                  <textarea name="insert_lead_noticia" class="form-control" cols="30" rows="5" maxlength="400" 
                  placeholder="Este domingo se efectuaron las Elecciones Presidenciales, instancia que, con un 99,99% de mesas escrutadas hasta el momento, dejó como vencedores a José Antonio Kast y Gabriel Boric, quienes avanzaron a segunda vuelta y el próximo 19 de diciembre decidirán al próximo presidente de la República." 
                  required></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Cuerpo:</label>
                  <!--<input type="text" class="form-control" name="insert_cuerpo_noticia">-->
                  <textarea name="insert_cuerpo_noticia" class="form-control" cols="30" rows="10" maxlength="10000" 
                  placeholder="De acuerdo a los datos entregados por el Servel, el total de votantes habilitados que participó de la instancia fue de 7.115.590, de los cuales hubo 7.027.068 votos emitidos válidamente. De ellos, 1.961.122 se decidió por Kast, mientras que 1.814.809 lo hizo por Boric. Esto representa una participación del 47,34%. Con este resultado, las elecciones presidenciales no logran superar la votación más masiva de los últimos 30 años que fue la del plebiscito por una nueva Constitución, en la que millones de compatriotas decidieron aprobar la escritura de una Carta Magna hecha por una Convención Constitucional." 
                  required></textarea>
                </div>
                <div class="row">
                  <?php
                        $sqlcategoria = "SELECT nombre_categoria FROM categoria_noticia";
                        $datacategoria= mysqli_query($conexion,$sqlcategoria);
                  ?>
                  <label class="form-label fw-bolder" >Categoría:</label>
                  <div class="mb-3 col-sm-12 col-md-3">
                      <!--<input type="text" class="form-control" name="insert_categoria_noticia">-->
                      <select class="form-select" name="insert_categoria_noticia" >
                            <option hidden selected required>Seleccione la categoria</option>
                            <?php while($row = mysqli_fetch_assoc($datacategoria)){?>
                                <option value="<?php echo$row["nombre_categoria"]?>"><?php echo$row["nombre_categoria"]?></option>
                            <?php }?>
                      </select>
                  </div>
                  <div class="mb-0 col-sm-12 col-md-3">
                    <a class="btn btn-secondary" href="insertar_categoria.php">Ingresar un categoria</a>
                  </div>
                </div>
                
                <div class="mb-3 col-sm-12 col-md-4">
                  <label class="form-label fw-bolder" >Imágen:</label>
                  <input type="file" accept="image/png, .jpeg, .jpg .svg .jpg" class="form-control" name="insert_imagen_noticia" required>
                </div>
                <div class="row w-25 mx-auto mt-4">
                  <button class="btn btn-secondary" type="submit">Guardar</button>
                </div>
              </form>
            </div>

            <div class="col-lg-12 mt-5">
              <div class="mb-4 text-center">
                <h5>Noticias ingresadas</h5>
              </div>
              <div class="table-responsive ">
                <table class="table table-hover table-bordered table-light" id="myTable">
                  <thead  class="table-dark">
                    <tr>
                      <th scope="col">Título noticia</th>
                      <th style="width: 100px" scope="col">Fecha </th>
                      <th class="d-none d-sm-table-cell" scope="col">Bajada</th>
                      <th class="d-none d-sm-table-cell" scope="col">Lead</th>
                      <th class="d-none d-sm-table-cell" scope="col">Cuerpo</th>
                      <th scope="col">Categoría</th>
                      <th style="width: 100px;" scope="col" >Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- GET -->
                    <?php
                      $consulta = "SELECT * FROM noticia";
                      $resultado = mysqli_query($conexion, $consulta);

                      while($row = mysqli_fetch_assoc($resultado)){
                        $get_titulo_noticia = $row["titulo_noticia"];
                        $get_fecha_noticia = $row["fecha_noticia"];
                        $get_lead_noticia = $row["lead_noticia"];
                        $get_bajada_noticia = $row["bajada_noticia"];
                        $get_cuerpo_noticia = $row["cuerpo_noticia"];
                        $get_categoria_noticia = $row["nombre_categoria"];
                        $id = $row["id_noticia"];
                        ?>
                        <tr>
                          <td> <p style="display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"><?php echo $get_titulo_noticia ?></p></td>
                          <td> <?php echo $get_fecha_noticia ?></td>
                          <td class="d-none d-sm-table-cell" > <p style="display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"> <?php echo $get_bajada_noticia ?></p></td>
                          <td class="d-none d-sm-table-cell" > <p style="display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"> <?php echo $get_lead_noticia ?></p></td>
                          <td class="d-none d-sm-table-cell" > <p style="display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"> <?php echo $get_cuerpo_noticia ?></p></td>
                          <td> <?php echo $get_categoria_noticia ?></td>
                          <td >
                            <a style="text-decoration: none;" href='ver_noticia.php?seleccion=<?php echo $id ?>'>
                              <span class="material-icons text-secondary">
                                visibility
                              </span>
                            </a>
                            <a style="text-decoration: none;" href='editar_noticia.php?seleccion=<?php echo $id ?>'>
                              <span  class="material-icons text-secondary">
                                edit
                              </span>
                            </a>
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