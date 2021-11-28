<?php require("crud/conexion.php")?>
<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    ?> 
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  </head>
  <body>
    <?php
        require_once("navbar_noSession.php");
    ?>
      
  <div class="row container-fluid">
      <div class="col-6 ">
  
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <?php 
              $consulta = "SELECT nombre_evento,fecha_evento,imagen_evento,id_lugar FROM evento  LIMIT 0,1 ";
              $info = mysqli_query($conexion,$consulta);
              $result=mysqli_fetch_assoc($info);
              $IDlugar = $result['id_lugar'];
              
              $consulta2 = "SELECT nombre_lugar FROM lugar WHERE id_lugar = $IDlugar";
              $info2 = mysqli_query($conexion,$consulta2);
              $result2=mysqli_fetch_assoc($info2);


            ?>
          <div class="carousel-inner">
            <div class="carousel-item active">
            <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $result['imagen_evento']).'"/ style="width:100%;max-height:700px;"></td>' ?>
              <div class="carousel-caption d-none d-md-block">
                <h5 class="bg-dark d-inline-block p-1"><?php echo $result['nombre_evento'];?></h5> <br>
                <p class="bg-dark d-inline-block p-1">Será realizado el día <?php echo $result['fecha_evento'];?> en <?php echo $result2['nombre_lugar'];?></p>
              </div>
            </div>

            <?php 
            $consulta = "SELECT nombre_evento,fecha_evento,imagen_evento,id_lugar,nombre_lugar FROM evento join lugar using(id_lugar) ORDER BY fecha_evento ASC LIMIT 0,3";
            $data = mysqli_query($conexion,$consulta);
            $result2=mysqli_fetch_assoc($data);
    
            
            
            while($row=mysqli_fetch_assoc($data)){
              $nombreEvento = $row['nombre_evento'];
              $imagenEvento = $row['imagen_evento']; 
              $lugarEvento = $row['nombre_lugar'];
              $fechaEvento = $row['fecha_evento'];
            
            ?>
             <div class="carousel-item ">
            <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $imagenEvento).'"/ style="width:100%;max-height:700px"></td>' ?>
              <div class="carousel-caption d-none d-md-block">
                <h5 class="bg-dark d-inline-block p-1"><?php echo $nombreEvento ?></h5> <br>
                <p class="bg-dark d-inline-block p-1">Será realizado el día <?php echo $fechaEvento;?> en <?php echo $lugarEvento;?></p>
              </div>
            </div>


            <?php } ?>

            
          </div>
   
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </div>

  
     

      <div class="col-6">
        <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php 
        $consulta = "SELECT titulo_noticia,bajada_noticia,imagen_noticia FROM noticia  LIMIT 0,4"; //HACER ORDER BY fecha_noticia ASC/DESC
        $data = mysqli_query($conexion,$consulta);
        while($row=mysqli_fetch_assoc($data)){
            $tituloNoticia = $row['titulo_noticia'];
            $bajadaNoticia = $row['bajada_noticia'];
            $imagenNoticia = $row['imagen_noticia']; 
         ?>
            <div class="col">
                <div class="card">
                <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $imagenNoticia).'"/ style="width:100%;height:100%;"></td>' ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $tituloNoticia; ?></h5>
                    <p class="card-text"><?php echo $bajadaNoticia; ?></p>
                </div>
                </div>
            </div> 
        <?php } ?>
      </div>
    </div>
  </div>
          <?php require_once("footer.php"); ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>