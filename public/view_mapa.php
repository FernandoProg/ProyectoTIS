<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <?php require("../user/head.php")?>
    <?php require("../crud/conexion.php")?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
    <body>
    <?php
        session_start();
        if(isset($_SESSION['nombre_usuario'])){
            if($_SESSION['rol'] == "usuario"){
                require("navbar_user.php");
            }else{
                header("Location: ../index.php");
            }
        }else{
            require("navbar_user.php");
        }
    ?>

    <div id="map" style="height:700px;"></div>

    <?php 
        $consulta = "SELECT nombre_lugar,latitud_lugar,longitud_lugar FROM lugar"; //HACER ORDER BY fecha_noticia ASC/DESC
        $data = mysqli_query($conexion,$consulta);
        while($row=mysqli_fetch_assoc($data)){ 
            $nombreLugar = $row['nombre_lugar'];
            $latitudLugar = $row['latitud_lugar'];
            $longitudLugar = $row['longitud_lugar'];
            // $categoriaLugar = $row['categoria_lugar'];
            
            echo "<input type=hidden value=$nombreLugar class='nombreLugar'> ";
            echo "<input type=hidden value=$latitudLugar class='latitudLugar'>";
            echo "<input type=hidden value=$longitudLugar class='longitudLugar'> ";
            // echo "<input type=hidden value=$categoriaLugar class='categoriaLugar'> ";
                       
        }
        
        ?>


    <script src="script_mapa.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>