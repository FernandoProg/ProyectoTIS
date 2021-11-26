<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("../header.php")?>
    <!-- LEAFLET MAP CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <!-- LEAFLET END -->

    <title>Municipalidad</title>
</head>
<body>
    <?php require("../navbar.php")?>
    <div class="container">
        <div class="row">
            <span class="text-center fs-2 fw-bolder">
                INGRESAR LUGAR
            </span>
        </div>
        <div class="row">
            <form action="Consultas/create_lugar.php" method="POST">
                <div class="mb-3">
                <label for="nombreLugar" class="form-label fw-bolder">Nombre lugar:</label>
                <input type="text"
                    class="form-control" required name="nombreLugar" id="nombreLugar" aria-describedby="helpId" placeholder="Bodega Acuenta" maxlength="50">
                </div>
                <div class="mb-3">
                <label for="latitudLugar" class="form-label fw-bolder">Latitud:</label>
                <input type="text"
                    class="form-control" required name="latitudLugar" id="latitudLugar" aria-describedby="helpId" placeholder="-36.05356" maxlength="9">
                </div>
                <div class="mb-3">
                <label for="longitudLugar" class="form-label fw-bolder">Longitud:</label>
                <input type="text"
                    class="form-control" required name="longitudLugar" id="longitudLugar" aria-describedby="helpId" placeholder="56.52525" maxlength="9">
                </div>
                <div id="map" style="height: 380px;"></div>
                <div class="mb-3">
                    <label for="categoriaLugar" class="form-label fw-bolder">Categoría:</label>
                    <select class="form-select" name="categoriaLugar">
                        <option hidden selected>Seleccione la categoría</option>
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
                <div class="mb-3">
                <label for="nombreAdmin" class="form-label fw-bolder">Nombre administrador:</label>
                <input type="text" class="form-control" required name="nombreUsuario" id="nombreUsuario" aria-describedby="helpId" placeholder="Juan Perez" maxlength="50">
                </div>
                <input name="" id="" class="btn btn-secondary" type="submit" value="Agregar">
                <!-- <a name="" id="" class="btn btn-primary mx-3" href="?controlador=lugares&accion=inicio" role="button">Volver al inicio</a> -->
            </form>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                LUGARES
            </span>
        </div>
        <?php
            require("../conexion.php");
            $consulta = "SELECT * FROM lugar";
            $data = mysqli_query($conexion,$consulta);
        ?>
        <table class="table table-hover table-light table-bordered">
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
                <?php while($row=mysqli_fetch_assoc($data)){?>
                    <tr>
                    <td><?php echo $row["id_lugar"]?></td>
                    <td><?php echo $row["nombre_lugar"]?></td>
                    <td><?php echo $row["latitud_lugar"]?></td>
                    <td><?php echo $row["longitud_lugar"]?></td>
                    <td><?php echo $row["categoria_lugar"]?></td>
                    <td><?php echo $row["nombre_admin"]?></td>
                    <td class="text-center">
                        <!-- <a href="#" class="btn btn-info">Editar</a> -->
                        <a href="Consultas/delete_lugar.php?id=<?php echo $row["id_lugar"];?>" >
                            <span class=" material-icons" style="color: red;">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>