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
        $flag = isset($_GET["page"]) ? $_GET["page"]*4 : 0;
        $sql = "SELECT * FROM emprendedor LIMIT $flag,4";
        $data = mysqli_query($conexion,$sql);
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
                <label class="form-label fw-bolder">Filtrar por rubro:</label>
                <select class="w-25 form-select" name="rubro_emprendedor">
                    <option hidden selected>Seleccione el Rubro</option>
                    <option value="Alimentos y bebestibles">Alimentos y bebestibles</option>
                    <option value="Ropa">Ropa</option>
                    <option value="Acicalamiento">Acicalamiento</option>
                    <option value="Entretenimiento">Entretenimiento</option>
                    <option value="Oficinas">Oficinas</option>
                    <option value="Administración de Viviendas">Administración de Viviendas</option>
                    <option value="Productora de eventos">Productora de eventos</option>
                </select>
            </div>
        </div>
        <div class="row pe-1">
    <?php
        while($row = mysqli_fetch_assoc($data)){
    ?>
        <div class="col w-25 ms-1 border border-2 rounded text-center mt-4 mb-4">
            <span style="justify-content: center;" class="d-flex fs-5 fw-bolder"><?php echo$row["rubro_emprendedor"] ?></span>
            <img style="height: 300px; width: 300px;" src="data:<?php echo$row["tipo_imagen"]?>;base64,<?php echo base64_encode($row["imagen_emprendedor"])?>">
            <span style="justify-content: center;"  class="d-flex fw-bolder">Nombre: <?php echo$row["nombre_emprendedor"]?></span>
            <span style="justify-content: center;"  class="d-flex  fw-bolder">Número: <?php echo$row["celular_emprendedor"]?> </span>
            <span style="justify-content: center;" class="d-flex  fw-bolder">Fono: <?php echo$row["telefono_emprendedor"]?> </span>
            <span style="justify-content: center;" class="d-flex  fw-bolder">Correo: <?php echo$row["correo_emprendedor"]?> </span>
            <span style="justify-content: center;" class=" text-center d-flex  fw-bolder">Dirección: <?php echo$row["direccion_emprendedor"]?> </span>
        </div>
    <?php }?>
        </div>
    </div>
    <div class="footer mt-4">
        <div class="container">
            <div class="row">
            <?php if($flag!=0){?>
                <div class="col">
                    <a class="btn btn-secondary w-100" href="view_emprendedores.php?page=<?php echo($_GET["page"]-1)?>">Anterior Página</a>
                </div>
            <?php }
                $prox =$flag+4;
                if(mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM emprendedor LIMIT $prox ,4"))){

            ?>
                <div class="col">
                        <a class="btn btn-secondary w-100" href="view_emprendedores.php?page=<?php echo($flag/4)+1?>">Siguiente Página</a>
                </div>
            <?php }?>
            </div>
        </div>
    </div>
</body>
</html>