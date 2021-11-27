<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipalidad</title>
    <?php require("../user/head.php")?>
    <?php require("../crud/conexion.php")?>
</head>
<body>
    <?php
        $sql = 'SELECT * FROM emprendedor';
        $data = mysqli_query($conexion,$sql);
        $emprendedores = mysqli_fetch_all($data);
        // echo count($emprendedores); length

    ?>
    <div>
        <div class="container mt-4">
            <div class="row text-center">
                <span class="fs-2 fw-bolder">
                    EMPRENDEDORES
                </span>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col">
                <span class="d-flex fs-4 fw-bolder"><?php echo$emprendedores[0][7] ?></span>
                <img style="width: 70%;" src="data:<?php echo$emprendedores[0][9]?>;base64,<?php echo base64_encode($emprendedores[0][8])?>">
                <span class="d-flex fw-bolder">Nombre: </span>
                <span class="d-flex  fw-bolder">Número: </span>
                <span class="d-flex  fw-bolder">Fono: </span>
                <span class="d-flex  fw-bolder">Correo: </span>
                <span class="d-flex  fw-bolder">Dirección: </span>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    <div class="footer mt-4">
        <div class="container">
            <div class="row">
                <div class="btn-group">
                    <a class="btn btn-secondary" href="#">Anterior Página</a>
                    <a class="btn btn-secondary" href="#">Siguiente Página</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>