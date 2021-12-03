<?php
require("../conexion.php");
include("../../sesion_usuarios/auth_admin.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("../header.php") ?>
    <!-- LEAFLET MAP CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- LEAFLET END -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <title>Lugares - Administrador</title>
</head>

<body>
        <?php require("../navbar.php") ?>
        <div class="container page-container">
            <div class="row">
                <span class="text-center fs-2 fw-bolder">
                    INGRESAR LUGAR
                </span>
            </div>
            <div class="row">
                <form action="Consultas/create_lugar.php" method="POST">
                    <div class="mb-3">
                        <label for="nombreLugar" class="form-label fw-bolder">Nombre lugar:</label>
                        <input type="text" readonly class="form-control" required name="nombreLugar" id="nombreLugar" aria-describedby="helpId" placeholder="Bodega Acuenta" maxlength="50">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="latitudLugar" id="latitudLugar" aria-describedby="helpId" placeholder="-36.05356" maxlength="9">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="longitudLugar" id="longitudLugar" aria-describedby="helpId" placeholder="56.52525" maxlength="9">
                    </div>
                    <h5>Buscar ubicación : </h5>
                    <input type="text" id="direccionIngresada" class="form-control form-control-lg">
                    <div class="d-grid my-2">
                        <button class="btn btn-primary" type="button" onclick="geocode()">Buscar</button>
                    </div>
                    <div id="map" style="height: 380px;"></div>
                    <div class="mb-3">
                        <label for="categoriaLugar" class="form-label fw-bolder">Categoría:</label>
                        <select class="form-select" name="categoriaLugar" required>
                            <option value="">Seleccione la categoría</option>
                            <option value="Lugar de trámite">Lugar de trámite</option>
                            <option value="Lugar de pago">Lugar de pago</option>
                            <option value="Lugar recreativo">Lugar recreativo</option>
                            <option value="Lugar de emergencia">Lugar de emergencia</option>
                            <option value="Local Comercial">Local Comercial</option>
                            <option value="Salud">Salud</option>
                            <option value="Correo">Correo</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Educación">Educación</option>
                        </select>
                    </div>
                    <input name="" id="" class="btn btn-secondary" type="submit" value="Agregar" onclick="geocode()">
                    <!-- <a name="" id="" class="btn btn-primary mx-3" href="?controlador=lugares&accion=inicio" role="button">Volver al inicio</a> -->
                </form>
            </div>
        </div>
        <div class="container mt-4 page-container">
            <div class="content-wrap">
                <div class="row text-center">
                    <span class="fs-2 fw-bolder">
                        LUGARES
                    </span>
                </div>
                <?php
                require("../conexion.php");
                $consulta = "SELECT * FROM lugar JOIN usuario USING(nombre_usuario)";
                $data = mysqli_query($conexion, $consulta);
                ?>
                <table class="table table-hover table-light table-bordered" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre lugar</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Categoría</th>
                            <th>Nombre Admin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
                            <tr>
                                <td><?php echo $row["id_lugar"] ?></td>
                                <td><?php echo $row["nombre_lugar"] ?></td>
                                <td><?php echo $row["latitud_lugar"] ?></td>
                                <td><?php echo $row["longitud_lugar"] ?></td>
                                <td><?php echo $row["categoria_lugar"] ?></td>
                                <td><?php echo $row["nombre_usuario"] ?></td>
                                <td class="text-center">
                                    <!-- <a href="#" class="btn btn-info">Editar</a> -->
                                    <a href="Consultas/delete_lugar.php?id=<?php echo $row["id_lugar"]; ?>">
                                        <span class=" material-icons" style="color: red;">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
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
                    </tbody>
                </table>
            </div>

        </div>
        <style>
            .page-container {
                position: relative;
                min-height: 100%;
            }

            .content-wrap {
                padding-bottom: 2.5rem;
                ;
            }

            .futer {
                position: absolute;
                bottom: 10;
                width: 100%;
                height: 2.5rem;
                /* Footer height */
            }
        </style>
        <script src="script.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    "zeroRecords": "No matching records found",
                    "lengthMenu": [
                        [5, 10, 15, -1],
                        [5, 10, 15, "All"]
                    ],


                });
            });
        </script>
        <?php require("../footer.php") ?>
</body>

</html>