<?php
  require("../conexion.php");
?>

<!doctype html>
  <html lang="es">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <?php require("../header.php")?>
      <title>Municipalidad</title>
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
                <input type="hidden" class="form-control" name="insert_nombre_admin" maxlength="50" value="Admin" placeholder="Juan Perez" required>
                <div class="mb-3">
                  <label class="form-label fw-bolder">Fecha:</label>
                  <input type="date" class="form-control" name="insert_fecha_noticia" required>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Titulo:</label>
                  <input type="text" class="form-control" name="insert_titulo_noticia" maxlength="100" placeholder="Elecciones presidenciales 2021 " required>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Bajada:</label>
                  <!--<input type="text" class="form-control" name="insert_bajada_noticia">-->
                  <textarea name="insert_bajada_noticia" class="form-control" cols="30" rows="2" maxlength="200" 
                  placeholder=" Este domingo se llevó a cabo la primera vuelta de las Elecciones Presidenciales, instancia en la que avanzaron Kast y Boric. ¿Cuánta gente sufragó?" 
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
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Categoria:</label>
                  <!--<input type="text" class="form-control" name="insert_categoria_noticia">-->
                  <select class="form-select" name="insert_categoria_noticia" >
                        <option hidden selected required>Seleccione la categoria</option>
                        <option value="Política">Política</option>
                        <option value="Deportiva">Deportiva</option>
                        <option value="Económica">Económica</option>
                        <option value="Cultural">Cultural</option>
                        <option value="Social">Social</option>
                        <option value="Policial">Policial</option>
                        <option value="Científica">Científica</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label fw-bolder" >Imagen:</label>
                  <input type="file" accept="image/png, .jpeg, .jpg .svg" class="form-control" name="insert_imagen_noticia" required>
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
              <div>
                <table class="table table-hover table-bordered table-light">
                  <thead  class="table-dark">
                    <tr>
                      <th scope="col">Admin</th>
                      <th scope="col">Titulo noticia</th>
                      <th scope="col">Fecha </th>
                      <th scope="col">Lead</th>
                      <th scope="col">Bajada</th>
                      <th scope="col">Cuerpo</th>
                      <th scope="col">Imagen</th>
                      <th scope="col">Categoria</th>
                      <th scope="col" >Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- GET -->
                    <?php
                      $consulta = "SELECT * FROM noticia";
                      $resultado = mysqli_query($conexion, $consulta);

                      while($row = mysqli_fetch_assoc($resultado)){
                        $get_nombre_admin = $row["nombre_admin"];
                        $get_titulo_noticia = $row["titulo_noticia"];
                        $get_fecha_noticia = $row["fecha_noticia"];
                        $get_lead_noticia = $row["lead_noticia"];
                        $get_bajada_noticia = $row["bajada_noticia"];
                        $get_cuerpo_noticia = $row["cuerpo_noticia"];
                        $get_imagen_noticia = $row["imagen_noticia"];
                        $get_categoria_noticia = $row["categoria_noticia"];
                        $id = $row["id_noticia"];
                        echo "<tr>";
                        echo "<td>".$get_nombre_admin."</td>";    
                        echo "<td>".$get_titulo_noticia."</td>"; 
                        echo "<td>".$get_fecha_noticia."</td>"; 
                        echo "<td>".$get_lead_noticia."</td>"; 
                        echo "<td>".$get_bajada_noticia."</td>"; 
                        echo "<td>".$get_cuerpo_noticia."</td>";
                        echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $get_imagen_noticia).'"/ style="width:128px;height:128px;"></td>';     
                        echo "<td>".$get_categoria_noticia."</td>"; 
                        //  DELETE AND UPDATE
                        
                        ?>
                          <td>
                            <a style="text-decoration: none;" href='editar_noticia.php?seleccion=<?php echo $id ?>'>
                              <span  class="material-icons text-secondary">
                                edit
                              </span>
                            </a>
                            <a href='Consultas/delete_noticia.php?seleccion=<?php echo $id ?>'>
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
    </body>
</html>