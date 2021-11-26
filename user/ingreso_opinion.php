<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('head.php') ?>
    <title>Municipalidad</title>
</head>

<body>
    <div class="container">

    </div>
    <div class="container mt-4">
            <div class="row fs-2 fw-bolder text-center">
                <span>INGRESO OPINION</span>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <label class="form-label fw-bolder">Nombre:</label>
                    <input class="form-control" type="correo" name="nombre_opinion" required>
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Correo:</label>
                    <input class="form-control" type="text" name="correo_opinion" required>
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
                    <label class="form-label fw-bolder">Imagenes:</label>
                    <input accept="image/png, .jpeg, .jpg, .svg" class="form-control" type="file" multiple name="imagenes_opinion[]" id="">
                    <label class="">Se puede ingresar un máximo de 5 imagenes.</label>
                </div>
            </div>
            <div class="row w-25 mx-auto mt-4">
                <input type="submit" class="btn btn-secondary" value="ingresar Opinion">
            </div>
        </form>
    </div>
</body>
</html>