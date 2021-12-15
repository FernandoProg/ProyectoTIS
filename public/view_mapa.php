<!doctype html>
<html lang="en">

<head>
  <!-- navbar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- /navbar -->
  
  <title>Mapa Comuna - Municipalidad</title>
  <?php require("../user/head.php") ?>
  <?php require("../crud/conexion.php") ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body>
  <?php
  require("navbar_user.php");
  ?>
  <div class="container my-4">
    <div class="row">
      <div class="col-12">
        <h3>Buscar ubicación : </h3>
        <form action="" id="formularioDireccion">
          <input type="text" id="direccionIngresada" class="form-control shadow-sm form-control-lg">
          <div class="d-grid my-2">
            <button class="btn btn-primary" style="width: 100px;" type="submit">Buscar</button>
          </div>
        </form>
      </div>
    </div>
    <div class="shadow col-12 mt-2" id="map" style="height:700px;" class=""></div>
  </div>
  

  <?php
  $consulta = "SELECT nombre_lugar,latitud_lugar,longitud_lugar,categoria_lugar FROM lugar"; //HACER ORDER BY fecha_noticia ASC/DESC
  $data = mysqli_query($conexion, $consulta);
  while ($row = mysqli_fetch_assoc($data)) {
    $nombreLugar = $row['nombre_lugar'];
    $latitudLugar = $row['latitud_lugar'];
    $longitudLugar = $row['longitud_lugar'];
    $categoriaLugar = $row['categoria_lugar'];

    echo "<input type=hidden value='$nombreLugar' class='nombreLugar'> ";
    echo "<input type=hidden value=$latitudLugar class='latitudLugar'>";
    echo "<input type=hidden value=$longitudLugar class='longitudLugar'> ";
    echo "<input type=hidden value='$categoriaLugar' class='categoriaLugar'> ";
  }

  ?>
  <div class="container-fluid text-center p-5">
<<<<<<< HEAD
    <div class="row">
      <div class="col-12 mb-4">
        <h2>¿Qué significa circulo de color en el mapa?</h2>
      </div>
      <div class="col-12">
        <p style="background-color:rgb(255,255,0);" class="p-2 m-2 d-xl-inline">Lugar de trámite</p>
        <p style="background-color:#FFA500;" class="p-2 m-2 d-xl-inline">Lugar de pago</p>
        <p style="background-color:#008000;" class="text-white p-2 m-2 d-xl-inline">Lugar recreativo</p>
        <p style="background-color:#FF0000;" class="text-white p-2 m-2 d-xl-inline">Lugar de emergencia</p>
        <p style="background-color:#FF00FF;" class="text-white p-2 m-2 d-xl-inline">Local Comercial</p>
        <p style="background-color:#000080;" class="text-white p-2 m-2 d-xl-inline">Salud</p>
        <p style="background-color:#00FFFF;" class="p-2 m-2 d-xl-inline">Correo</p>
        <p style="background-color:#808080" class="text-white p-2 m-2 d-xl-inline">Transporte</p>
        <p style="background-color:#800000;" class="text-white p-2 m-2 d-xl-inline">Educación</p>
      </div>
=======
    <h2>¿Qué significa circulo de color en el mapa?</h2>
    <div class="mt-4">
      <p style="background-color:rgb(255,255,0);" class="p-2 m-2 d-xl-inline">Lugar de trámite</p>
      <p style="background-color:#FFA500;" class="p-2 m-2 d-xl-inline">Lugar de pago</p>
      <p style="background-color:#008000;" class="text-white p-2 m-2 d-xl-inline">Lugar recreativo</p>
      <p style="background-color:#FF0000;" class="text-white p-2 m-2 d-xl-inline">Lugar de emergencia</p>
      <p style="background-color:#FF00FF;" class="text-white p-2 m-2 d-xl-inline">Local Comercial</p>
      <p style="background-color:#000080;" class="text-white p-2 m-2 d-xl-inline">Salud</p>
      <p style="background-color:#00FFFF;" class="p-2 m-2 d-xl-inline">Correo</p>
      <p style="background-color:#808080" class="text-white p-2 m-2 d-xl-inline">Transporte</p>
      <p style="background-color:#800000;" class="text-white p-2 m-2 d-xl-inline">Educación</p>
>>>>>>> Master
    </div>
  </div>
  <script src="script_mapa.js"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <?php require("../footer.php"); ?>
</body>

</html>