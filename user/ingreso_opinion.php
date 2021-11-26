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
    <div class="container">
        <form action="">
            <div class="row mt-4">
                <div class="col">
                    <label class="form-label fw-bolder">Nombre:</label>
                    <input class="form-control" type="correo" name="nombre">
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Correo:</label>
                    <input class="form-control" type="text" name="correo">
                </div>
            </div>
            <div class="row">
                <div class="col mt-4">
                    <label class="form-laber fw-bolder">Descripción:</label>
                    <textarea name="descripcion" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
        </form>
    </div>
</body>
</html>