<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('head.php') ?>
    <title>Ingresar Opinión</title>
</head>

<body>
    <?php require("navbar_user.php"); ?>
    <div class="container my-4">
        <form action="Consultas/create_opinion.php" method="POST" enctype="multipart/form-data">
            <div class="row fs-2 fw-bolder text-center">
                <span>INGRESO OPINIÓN</span>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label class="form-label fw-bolder">Título opinión:</label>
                    <input class="form-control" type="correo" name="nombre_opinion" required>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label class="form-laber fw-bolder">Descripción:</label>
                    <textarea name="descripcion_opinion" class="form-control" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label class="form-label fw-bolder">Imágenes:</label>
                    <input accept="image/png, .jpeg, .jpg, .svg" class="form-control" type="file" multiple name="imagenes_opinion[]" id="">
                    <label class="">Se puede ingresar un máximo de 5 imagenes.</label>
                </div>
            </div>
            <div class="row w-25 mx-auto mt-4">
                <input type="submit" class="btn btn-secondary" value="ingresar Opinion">
            </div>
        </form>
    </div>
    <?php require("../footer.php"); ?>
</body>
</html>