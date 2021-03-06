<?php
    require("Consultas/conexion.php");
?>    

<!doctype html>
<html lang="es">
    <head>
        <!-- navbar -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- /navbar -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require("head.php")?>
        <title>Envío Contribución</title>
    </head>
    <body>
        <?php require("navbar_user.php")?>
        <div class="container mb-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h1 class="text-center">Ingresar Contribución</h1>
                    <form action="Consultas/create_contribucion.php" method="POST" enctype="multipart/form-data" >
                        <div class="mb-3 col-lg-6 col-sm-12">
                            <label class="form-label fw-bolder">Nombre de la contribución:</label>
                            <input class="form-control shadow-sm" rows="3" maxlength="50" placeholder="Creacion de areas recreativas" name="nombre_contribucion" required >
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Descripción:</label>
                            <textarea class="form-control shadow-sm" cols="30" rows="4" maxlength="1000" placeholder="Se solicita la posibilidad de mayor cantidad de areas recreativas" name="descripcion_contribucion" required  ></textarea>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-sm-12">
                                <label class="form-label fw-bolder">Departamento:</label>
                                <select class="form-select shadow-sm" name="departamento">
                                    <option hidden selected value="" >Seleccione el departamento</option>
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
                            <div class="col-lg-6 col-sm-12">
                                <label class="form-label fw-bolder">Imagenes:</label>
                                <input accept="image/png, .jpeg, .jpg, .svg" class="form-control shadow-sm" type="file" multiple name="imagenes_contribucion[]" id="">
                                <label class="">Se puede ingresar un máximo de 5 imagenes.</label>
                            </div>
                        </div>
                        <input type="submit" class="btn mt-3 btn-secondary" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
        <?php require("../footer.php"); ?>
    </body>
</html>