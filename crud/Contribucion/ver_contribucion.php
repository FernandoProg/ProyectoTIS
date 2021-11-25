<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Municipalidad</title>
    <?php require("../header.php")?>
</head>

    <?php
        require("../conexion.php");
        $id = $_GET["id"];
        $query = "SELECT * FROM contribucion WHERE id_contribucion =$id";
        $data = mysqli_query($conexion,$query);
        $row_data = mysqli_fetch_assoc($data);
        $query_image ="SELECT imagen_contribuciones FROM imagen_contribucion WHERE id_contribucion = $id";
        $data_image = mysqli_query($conexion,$query_image); 
    ?>

    <body>
        <?php require("../navbar.php") ?>
        <div class="container">
            <div class="row">
                <div class="col fs-3">
                    <span class="">
                        <b>Nombre: </b> <?php echo$row_data["nombre_contribucion"]?>
                    </span>
                    <span class="d-flex">
                        <b>Correo: </b> <?php echo$row_data["correo_contribucion"]?>
                    </span>
                </div>
                <div class="col fs-3">
                    <span class="">
                        <b>Departamento:</b> <?php echo$row_data["departamento"]?>
                    </span>
                    <a  href="Consultas/delete_contribucion.php?id=<?php echo$id?>" style="text-decoration: none;">
                        <span class="material-icons fs-2  " style="color: red;">
                            delete
                        </span>
                    </a>
                </div>
            </div>
            <div class="row mt-4 fs-3">
                <span class="fw-bolder">
                    Descripcion de la contribucion:
                </span>
                <span style="text-align: justify;" class="text-justify d-flex text-break ">
                    <?php echo$row_data["descripcion_contribucion"]?>
                </span>
            </div>
        <div class="fs-2 fw-bolder">
            Imágenes:
        </div>
            <div class="row">
                <?php
                    while($imagen = mysqli_fetch_assoc($data_image)){
                ?>
                    <div class="col">
                        <img style="width: 100px;" src="data:;base64,<?php echo base64_encode($imagen["imagen_contribuciones"])?>">
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <a href="../Contribucion" class="btn btn-primary">Volver al inicio</a>
            </div>
        </div>
    </body>
</html>