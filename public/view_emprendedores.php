<!DOCTYPE html>
<html lang="es">
<head>
    <!-- navbar -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- /navbar -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprendedores - Municipalidad</title>
    <?php require("../user/head.php")?>
    <?php require("../crud/conexion.php")?>
    <script
    src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
     integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous">
    </script>
    <script src="main.js"></script>
    <script src="script.js"></script>
    <body>
    <?php
        require("navbar_user.php");
    ?>
    <?php
        $rubro = isset($_GET["rubro"]) ? $_GET["rubro"]:'';
        $flag = isset($_GET["page"]) ? $_GET["page"]*4 : 0;
        $sql =($rubro=='')? "SELECT * FROM emprendedor LIMIT $flag,4 ": "SELECT * FROM emprendedor WHERE rubro_emprendedor = '$rubro' LIMIT $flag,4";
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
                    <label class="form-label fw-bolder d-block">Filtrar por rubro:</label>
                    <select class="w-25 form-select d-inline" id="rubro" name="rubro_emprendedor">
                        <option hidden selected>Seleccione el Rubro</option>
                        <option value="Alimentos y bebestibles">Alimentos y bebestibles</option>
                        <option value="Ropa">Ropa</option>
                        <option value="Acicalamiento">Acicalamiento</option>
                        <option value="Entretenimiento">Entretenimiento</option>
                        <option value="Oficinas">Oficinas</option>
                        <option value="Administración de Viviendas">Administración de Viviendas</option>
                        <option value="Productora de eventos">Productora de eventos</option>
                    </select>
                    <a id="link" class="btn  btn-secondary mb-1 d-inline-flex" href="#">Filtrar</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row p-1">
        <?php
            while($row = mysqli_fetch_assoc($data)){
        ?>
                <div class="col-xl-3 col-md-12 shadow card text-center mt-4 mb-4 pb-2">
                    <span style="justify-content: center;" class="mt-2 d-flex fs-5 fw-bolder"><?php echo$row["rubro_emprendedor"] ?></span>
                    <img style="height: 90%; width: 50%;"class="img-fluid mt-2 mx-auto" src="data:<?php echo$row["tipo_imagen"]?>;base64,<?php echo base64_encode($row["imagen_emprendedor"])?>">
                    <span style="justify-content: center;"  class="mt-2 d-flex fw-bolder">Nombre: <?php echo$row["nombre_emprendedor"]?></span>
                    <span style="justify-content: center;"  class="mt-2 d-flex  fw-bolder">Número: <?php echo$row["celular_emprendedor"]?> </span>
                    <span style="justify-content: center;" class="mt-2 d-flex  fw-bolder">Fono: <?php echo$row["telefono_emprendedor"]?> </span>
                    <span style="justify-content: center;" class="mt-2 d-flex  fw-bolder">Correo: <?php echo$row["correo_emprendedor"]?> </span>
                    <span style="justify-content: center;" class="mt-2 d-flex  fw-bolder">Dirección: <?php echo$row["direccion_emprendedor"]?></span>
                    <a class="mt-2 btn btn-secondary w-25 mx-auto" href="view_emprendedor.php?id=<?php echo$row["id_emprendedor"]?>">Ver Mas</a>
                    <div class="mt-2 " >
                        <span class="visitas p-3 d-inline-block">
                            <span class="material-icons align-bottom">visibility</span>
                            <span class="fw-bolder"><?php echo$row["visitas_emprendedor"]?></span>
                        </span>
                    </div>
                </div>
        <?php }?>
        </div>
    </div>
    <div class="footer my-4">
        <div class="container">
            <div class="row">
            <?php 
                if($flag!=0){
                    $ant = $flag-4;
                    $sqlAnt =($rubro=='')? "SELECT * FROM emprendedor LIMIT $ant ,4": "SELECT * FROM emprendedor WHERE rubro_emprendedor = '$rubro' LIMIT $ant,4";
                    if(mysqli_num_rows(mysqli_query($conexion,$sqlAnt))){
                        $page = ($flag/4)-1;
                        $varGET = ($rubro!='')? "page=$page?rubro=$rubro":"page=$page";
                ?>
                <div class="col">
                    <a class="btn btn-secondary w-100" href="view_emprendedores.php?page=<?php echo($_GET["page"]-1)?>">Anterior Página</a>
                </div>
            <?php
                    }
                }?>
                <div class="col">
                    <a href="view_emprendedores.php" class="btn btn-secondary w-100">Volver al inicio</a>
                </div>
            <?php 
                
                $prox =$flag+4;
                $sqlProx = ($rubro=='')? "SELECT * FROM emprendedor LIMIT $prox ,4": "SELECT * FROM emprendedor WHERE rubro_emprendedor = '$rubro' LIMIT $prox ,4";
                if(mysqli_num_rows(mysqli_query($conexion,$sqlProx))){
                    $page = ($flag/4)+1;
                    $varGET = ($rubro!='')? "page=$page?rubro=$rubro":"page=$page";
            ?>
                <div class="col">
                    <a class="btn btn-secondary w-100" href="view_emprendedores.php?<?php echo$varGET?>">Siguiente Página</a>
                </div>
            <?php }?>
            </div>
        </div>
    </div>
    <?php require("../footer.php"); ?>
</body>
</html>