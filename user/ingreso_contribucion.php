<?php
    require("Consultas/conexion.php");
?>    

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require("head.php")?>
        <title>Envío Contribución</title>
    </head>
    <body>
        <?php require("navbar_user.php")?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h1 class="text-center">Ingresar Contribución</h1>
                    <form action="Consultas/create_contribucion.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Nombre de la contribución:</label>
                            <input class="form-control" rows="3" maxlength="50" placeholder="Creacion de areas recreativas" name="nombre_contribucion">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Descripción:</label>
                            <textarea class="form-control" cols="30" rows="4" maxlength="1000" placeholder="Se solicita la posibilidad de mayor cantidad de areas recreativas" name="descripcion_contribucion"></textarea>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="departamento">
                                <option hidden selected>Seleccione el departamento</option>
                                <option value="Aseo y ornato">Aseo y ornato</option>
                                <option value="Tránsito y transporte">Tránsito y transporte</option>
                                <option value="Administración y Finanzas">Administración y Finanzas</option>
                                <option value="Salud Municipal">Salud Municipal</option>
                                <option value="Desarrollo comunitario">Desarrollo comunitario</option>
                                <option value="Secretaría Municipal">Secretaría Municipal</option>
                                <option value="Obras municipales">Obras municipales</option>
                                <option value="Obras municipales">Secretaría Comunal de Planificación y Coordinación</option>
                                <option value="Obras municipales">Medio ambiente</option>
                                <option value="Obras municipales">Informática</option>
                                <option value="Obras municipales">Control, gestión y desarrollo de personas</option>
                                <option value="Obras municipales">Cultura</option>
                                <option value="Obras municipales">Gestión de riesgos y emergencias</option>
                                <option value="Obras municipales">Seguridad</option>
                                <option value="Obras municipales">Relaciones públicas y prensa</option>
                                <option value="Obras municipales">Jurídico</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-secondary" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>