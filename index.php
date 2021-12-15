<?php require("crud/conexion.php") ?>
<!doctype html>
<html lang="es">
<<<<<<< HEAD
  <head>
    <title>Municipalidad de Chañaral</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    ?> 
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
  </head>
  <body>
=======
>>>>>>> Master

<head>
  <title>Municipalidad de Chañaral</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  ?>
  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

  <?php
  require_once("navbar_user.php");
  ?>

  <div class="row container-fluid my-5">
    <div class="col-12 col-md-6 mt-4">
      <?php
      $consulta = "SELECT nombre_evento,fecha_evento,imagen_evento,id_lugar,nombre_lugar FROM evento join lugar using(id_lugar) LIMIT 0,1 ";
      $info = mysqli_query($conexion, $consulta);
      if (mysqli_num_rows($info)) {
      ?>
<<<<<<< HEAD
        <?php $result=mysqli_fetch_assoc($info);?>
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner shadow  ">
=======
        <?php $result = mysqli_fetch_assoc($info); ?>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner ">
>>>>>>> Master
            <div class="carousel-item active">
              <?php echo '<td><img src="data:image/jpeg;base64,' . base64_encode($result['imagen_evento']) . '"/ style="width:100%;max-height:700px;"></td>' ?>

              <div class=" mx-auto text-center">
                <h5 class="bg-dark d-inline-block text-white mx-auto p-1 my-1"><?php echo $result['nombre_evento']; ?></h5> <br>
                <p class="bg-dark d-inline-block text-white p-1">Será realizado el día <?php echo $result['fecha_evento']; ?> en <?php echo $result['nombre_lugar']; ?></p>
              </div>

            </div>
            <?php
            $consulta = "SELECT nombre_evento,fecha_evento,imagen_evento,id_lugar,nombre_lugar FROM evento join lugar using(id_lugar)  LIMIT 0,3";
            $data = mysqli_query($conexion, $consulta);
            $result2 = mysqli_fetch_assoc($data);


            while ($row = mysqli_fetch_assoc($data)) {
              $nombreEvento = $row['nombre_evento'];
              $imagenEvento = $row['imagen_evento'];
              $lugarEvento = $row['nombre_lugar'];
              $fechaEvento = $row['fecha_evento'];

            ?>
              <div class="carousel-item ">
                <?php echo '<td><img src="data:image/jpeg;base64,' . base64_encode($imagenEvento) . '"/ style="width:100%;max-height:700px"></td>' ?>

                <div class=" mx-auto text-center">
                  <h5 class="bg-dark d-inline-block text-white mx-auto p-1 my-1"><?php echo $nombreEvento; ?></h5> <br>
                  <p class="bg-dark d-inline-block text-white p-1">Será realizado el día <?php echo $fechaEvento; ?> en <?php echo $lugarEvento; ?></p>
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
      <?php } else { ?>
        <img src="crud/img/evento_no_disponible.png" class="img-fluid" style="width:100%; height:100%;">
      <?php } ?>
    </div>
    <div class="col-12 col-md-6 mt-4">
      <?php
      $consulta = "SELECT id_noticia,titulo_noticia,bajada_noticia,imagen_noticia FROM noticia  LIMIT 0,4"; //HACER ORDER BY fecha_noticia ASC/DESC
      $data = mysqli_query($conexion, $consulta);
      if (mysqli_num_rows($data)) {
      ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <?php
          while ($row = mysqli_fetch_assoc($data)) {
            $tituloNoticia = $row['titulo_noticia'];
            $bajadaNoticia = $row['bajada_noticia'];
            $imagenNoticia = $row['imagen_noticia'];
            $idNoticia = $row['id_noticia'];
          ?>
            <div class="col">
<<<<<<< HEAD
                <div class="card shadow">
                <td><a href="public/ver_noticia.php?seleccion=<?php echo $idNoticia ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($imagenNoticia)?>"/ style="width:100%;height:100%; "></a></td>
=======
              <div class="card">
                <td><a href="public/ver_noticia.php?seleccion=<?php echo $idNoticia ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($imagenNoticia) ?>" / style="width:100%;height:100%; "></a></td>
>>>>>>> Master
                <div class="card-body">
                  <h5 class="card-title"><?php echo $tituloNoticia; ?></h5>
                  <p class="card-text" style="display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            text-overflow: ellipsis;"><?php echo $bajadaNoticia; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } else { ?>
        <img src="crud/img/evento_no_disponible.png" alt="">
      <?php } ?>
    </div>
  </div>
  <?php require("footer.php");; ?>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>