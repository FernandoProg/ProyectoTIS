<?php require("crud/conexion.php")?>
<!doctype html>
<html lang="en">
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
  <nav class="navbar bg-primary mb-4">
        <div class="container-fluid">   
            <a class="navbar-brand" href="index.php">
                <img src="crud/img/logo.png" style="width: 40%;">
            </a>
            <ul class="nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="crud/Evento/index.php">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="crud/Noticia/index.php">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="crud/Emprendedor/index.php">Emprendedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="crud/Lugar/index.php">Mapa Comuna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="crud/Opinion/index.php">Opiniones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="crud/Contribucion/index.php">Contribuciones</a>
                </li>
            </ul>
            <ul class="nav justify-content-end">
            <li class="nav-item">
                    <a class="nav-link text-white"  href="sesion_usuarios/logout.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"  href="../..">Acceso Funcionarios</a>
                </li>
            </ul>
        </div>
    </nav>
      
  <div class="row container-fluid">
      <div class="col-6 ">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://fundacioncompartir.org/sites/default/files/estos-son-algunos-de-los-edificios-construidos-en-madera.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://fundacioncompartir.org/sites/default/files/estos-son-algunos-de-los-edificios-construidos-en-madera.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://fundacioncompartir.org/sites/default/files/estos-son-algunos-de-los-edificios-construidos-en-madera.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
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
        $consulta = "SELECT nombre_evento,descripcion_evento,imagen_evento FROM evento";
        $data = mysqli_query($conexion,$consulta);
        while($row=mysqli_fetch_assoc($data)){
            $nombreEvento = $row['nombre_evento'];
            $descripcionEvento = $row['descripcion_evento'];
            $imagenEvento = $row['imagen_evento']; 
         ?>
            <div class="col">
                <div class="card">
                <?php echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $imagenEvento).'"/ style="width:100%;height:100%;"></td>' ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nombreEvento; ?></h5>
                    <p class="card-text"><?php echo $descripcionEvento; ?></p>
                </div>
                </div>
            </div> 
        <?php } ?>
      </div>
    </div>
  </div>
  
  
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>