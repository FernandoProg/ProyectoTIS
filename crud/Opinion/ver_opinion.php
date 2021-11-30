<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver opinión - Administrador</title>
    <?php require("../header.php")?>
</head>

<?php
    require("../conexion.php");
    $id = $_GET["id"];
    $query = "SELECT nombre_opinion, nombre_usuario, descripcion_opinion, fecha_opinion FROM opinion WHERE id_opinion =$id";
    $data = mysqli_query($conexion,$query);
    $row_data = mysqli_fetch_assoc($data);
    $user = $row_data["nombre_usuario"];

    $query_image ="SELECT tipo_imagen,imagen_opiniones FROM imagen_opinion WHERE id_opinion = $id";
    $data_image = mysqli_query($conexion,$query_image); 


    $query_correo ="SELECT correo_usuario FROM usuario WHERE nombre_usuario = '$user'";
    $data_correo = mysqli_query($conexion,$query_correo);
    $row_correo = mysqli_fetch_assoc($data_correo);
    
   
?>

<body>
    <?php require("../navbar.php") ?>
    <div class="container">
        <div class="row">
            <span class="fs-2 fw-bolder text-center">
                OPINIÓN
            </span>
        </div>
        <div class="row mt-4">
            <div class="col fs-3">
                <span class="fw-bolder">
                    Nombre: <?php echo$row_data["nombre_opinion"]?>
                </span>
                <span class="d-flex fw-bolder">
                    Correo: <?php echo$row_correo["correo_usuario"]?>
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
                Descripción de la opinión:
            </span>
            <span style="text-align: justify;" class="text-justify d-flex">
                <?php echo$row_data["descripcion_opinion"]?>
            </span>
        </div>
    <?php if(mysqli_num_rows($data_image)>0){?>
        <div class="fs-2 mt-4 ">
            Imágenes:
        </div>
            <div class="row mb-4">
                <?php
                    while($imagen = mysqli_fetch_assoc($data_image)){
                ?>
                    <div class="col-xl col-lg-12 mt-4">
                        <img style="height: 100%; width: 100%;" src="data:<?php echo$imagen["tipo_imagen"]?>;base64,<?php echo base64_encode($imagen["imagen_opiniones"])?>">
                    </div>
                <?php }?>
            </div>
        </div>
    <?php }?>
    <div class="container">
        <div class="row mb-4">
            <a href="../Opinion" class="btn mx-auto btn-primary w-25">Volver atrás</a>
        </div>
    </div>
    <?php require("../footer.php") ?>
</body>
</html>