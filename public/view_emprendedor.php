<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver más - Emprendedor</title>
    <?php require("../user/head.php")?>
    <?php require("../crud/conexion.php")?>
</head>
<body>
    <?php
        require("navbar_user.php");
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $sql = "SELECT * FROM emprendedor WHERE id_emprendedor = $id";
            $query = mysqli_query($conexion,$sql);  
            if(mysqli_num_rows($query)>0){
                $row = mysqli_fetch_assoc($query);
            ?>
                <div class="container-fluid my-4 px-4">
                    <div class="row">
                        <div class="col-lg-2 col-md-12 mt-4 text-center">
                            <img style="height: 100%; width: 100%;"class="" src="data:<?php echo$row["tipo_imagen"]?>;base64,<?php echo base64_encode($row["imagen_emprendedor"])?>">
                        </div>
                        <div class="col-lg-6 col-md-12 mt-4 text-center ">
                            <span class="text-center mt-4 mb-2 fs-2 fw-bolder">
                                Información 
                            </span>
                            <span style="text-align: justify;" class="d-flex fw-bolder">
                                <?php echo$row["informacion"]?>
                            </span>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-4 card">
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
                            <?php
                                if($row["facebook"]!=null || $row["instagram"]!=null){                              
                            ?>
                            <div class="">
                                <span class="align-middle material-icons">
                                    group
                                </span>
                                <span class="fw-bolder">
                                    Redes sociales:
                                </span>
                                <?php if($row["facebook"]!=null){?>
                                    <a href="https://www.facebook.com/public/<?php echo$row["facebook"]?>" style="text-decoration: none;" class="ms-4">
                                        <i style="color: #2851A3;" class="align-middle fs-4 fab fa-facebook-square"></i>
                                    </a>
                                <?php }?>
                                <?php if($row["instagram"]!=null){?>
                                    <a href="https://www.instagram.com/<?php echo$row["instagram"]?>" class="ms-4" style="text-decoration: none;">
                                        <i class="align-middle instagram fs-4 fab fa-instagram-square" style="color: #fd5949;"></i>
                                    </a>
                                <?php }?>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="row"> <!--imagenes pyme-->
                        <div class="col-lg-12">
                        <?php 
                            $query_image ="SELECT * FROM imagen_producto JOIN emprendedor USING(id_emprendedor)";
                            $data_image = mysqli_query($conexion,$query_image); 
                            if(mysqli_num_rows($data_image)>0){?>
                            <div class="fs-2 mt-4 ms-3">
                                Productos:
                            </div>
                                <div class="row mb-4 text-center">
                                    <?php
                                        while($imagen = mysqli_fetch_assoc($data_image)){
                                    ?>
                                        <div class="col-xl col-lg-12 mt-4">
                                            <img style="height: 300px; width: 300px;" src="data:;base64,<?php echo base64_encode($imagen["imagen_emprendedores"])?>">
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <div class="row mt-4 w-25 mx-auto">
                        <a href="view_emprendedores.php" class="btn btn-secondary">Volver</a>
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
    <?php } require("../footer.php"); ?>
</body>
</html>