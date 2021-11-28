<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>  
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
    $query = "SELECT nombre_opinion,correo_opinion,descripcion_opinion,fecha_opinion FROM opinion WHERE id_opinion =$id";
    $data = mysqli_query($conexion,$query);
    $row_data = mysqli_fetch_assoc($data);
    $query_image ="SELECT tipo_imagen,imagen_opiniones FROM imagen_opinion WHERE id_opinion = $id";
    $data_image = mysqli_query($conexion,$query_image); 
?>

<body>
    <?php require("../navbar.php") ?>
    <div class="container">
        <div class="row">
            <span class="fs-2 fw-bolder text-center">
                OPINION
            </span>
        </div>
        <div class="row mt-4">
            <div class="col fs-3">
                <span>
                    Nombre: <?php echo$row_data["nombre_opinion"]?>
                </span>
                <span class="d-flex">
                    Correo: <?php echo$row_data["correo_opinion"]?>
                </span>
            </div>
            <div class="col fs-3 justify-content-end d-flex">
                <span class="">
                    Fecha: <?php echo$row_data["fecha_opinion"]?>
                </span>
                <a  href="Consultas/eliminar_opinion.php?id=<?php echo$id?>" style="text-decoration: none;">
                    <span class="material-icons fs-2 mt-1" style="color: red;">
                        delete
                    </span>
                </a>
            </div>
        </div>
        <div class="row mt-4 fs-4">
            <span>
                Descripcion de la opinion:
            </span>
            <span style="text-align: justify;" class="text-justify d-flex">
                <?php echo$row_data["descripcion_opinion"]?>
            </span>
        </div>
    <div class="fs-2 mt-4 ">
        Imagenes:
    </div>
        <div class="row mb-4">
            <?php
                while($imagen = mysqli_fetch_assoc($data_image)){
            ?>
                <div class="col">
                    <img style="width: 50%;" src="data:<?php echo$imagen["tipo_imagen"]?>;base64,<?php echo base64_encode($imagen["imagen_opiniones"])?>">
                </div>
            <?php }?>
        </div>
    </div>
    <div class="container">
        <div class="row mb-4">
            <a href="../Opinion" class="btn mx-auto btn-primary w-25">Volver atrás</a>
        </div>
    </div>
</body>
</html>