<?php
    require("../conexion.php");
?>    

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require("../header.php")?>
        <title>Envío Contribución</title>
    </head>
    <body>
        <?php require("../navbar.php")?>
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="text-center">Ingresar Contribución</h1>
                    <form action="create_contribucion.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Nombre de la contribución:</label>
                            <input class="form-control" rows="3" maxlength="50" placeholder="Usuario" name="nombre_contribucion">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Correo Usuario:</label>
                            <input class="form-control" rows="3" maxlength="50" placeholder="Usuario" name="correo_contribucion">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Descripción:</label>
                            <input class="form-control" rows="3" maxlength="1000" placeholder="Usuario" name="descripcion_contribucion">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Departamento:</label>
                            <input class="form-control" rows="3" maxlength="50" placeholder="Usuario" name="departamento">
                        </div>
                        <input type="submit" class="btn btn-secondary" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>