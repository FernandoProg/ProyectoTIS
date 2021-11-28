<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require("../user/head.php")?>
    <?php require("../crud/conexion.php")?>
</head>
<body>
    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $sql = "SELECT * FROM emprendedor WHERE id_emprendedor = $id";
            $query = mysqli_query($conexion,$sql);  
            if($query){
                $row = mysqli_fetch_assoc($query);
            ?>
                <div class="container-fluid my-4 px-4">
                    <div class="row">
                        <div class="col text-center">
                            <img style="height: 300px; width: 300px;"class="" src="data:<?php echo$row["tipo_imagen"]?>;base64,<?php echo base64_encode($row["imagen_emprendedor"])?>">
                        </div>
                        <div class="col">
                            <span class="text-center mt-4 mb-2 fs-2 fw-bolder">
                                Información 
                            </span>
                            <span class="fw-bolder text-justify">
                                <?php echo$row["informacion"]?>
                            </span>
                        </div>
                        <div class="col card">
                            <span class="text-center my-4 fs-2 fw-bolder">
                                Información Emprendedor
                            </span>
                            <div class="">
                                <span class="align-middle material-icons">
                                    perm_contact_calendar
                                </span>
                                <span class="fw-bolder">
                                    Nombre:
                                </span>
                                <span class="fw-bolder">
                                    <?php echo$row["nombre_emprendedor"]?>
                                </span>
                            </div>
                            <div class="">
                                <span class="align-middle material-icons">
                                    home
                                </span>
                                <span class="fw-bolder">
                                    Dirección:
                                </span>
                                <span class="fw-bolder">
                                    <?php echo$row["direccion_emprendedor"]?>
                                </span>
                            </div>
                            <div class="">
                                <span class=" align-middle material-icons">
                                    phone
                                </span>
                                <span class="fw-bolder">
                                    Teléfono:
                                </span>
                                <span class="fw-bolder">
                                    <?php echo$row["telefono_emprendedor"]?>
                                </span>
                            </div>
                            <div class="">
                                <span class="align-middle material-icons">
                                    phone_iphone
                                </span>
                                <span class="fw-bolder">
                                    Celular:
                                </span>
                                <span class="fw-bolder">
                                    <?php echo$row["celular_emprendedor"]?>
                                </span>
                            </div>
                            <div class="">
                                <span class="align-middle material-icons">
                                    email
                                </span>
                                <span class="fw-bolder">
                                    Email:
                                </span>
                                <span class="fw-bolder">
                                    <?php echo$row["correo_emprendedor"]?>
                                </span>
                            </div>
                            <div class="">
                                <span class="align-middle material-icons">
                                    work
                                </span>
                                <span class="fw-bolder">
                                    Rubro:
                                </span>
                                <span class="fw-bolder">
                                    <?php echo$row["rubro_emprendedor"]?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i style="color: #2851A3;" class="fs-2 fab fa-facebook-square"></i>
                            <i class="fs-2 fab fa-instagram-square"></i>
                        </div>
                    </div>
                </div>
            <?php
            }else{
            ?>
                <div class="container">
                    <div class="row">
                        <div class="col text-center my-5">
                            <span class="fw-bolder fs-2">El emprendedor no existe</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <a class="btn btn-secondary" href="view_emprendedores.php">Volver al inicio</a>    
                        </div>
                    </div>
                </div>
            <?php
            }
    ?>

    <?php }else{?>
        <div class="container">
            <div class="row">
                <div class="col text-center my-5">
                    <span class="fw-bolder fs-2">Seleccione un emprendedor</span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a class="btn btn-secondary" href="view_emprendedores.php">Volver al inicio</a>    
                </div>
            </div>
        </div>
    <?php }?>
</body>
</html>