<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Contribución - Administrador</title>
    <?php require("../header.php")?>
</head>
    <!-- navbar -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- /navbar -->

    <?php
        require("../conexion.php");
        $id = $_GET["id"];
        $query = "SELECT * FROM contribucion WHERE id_contribucion =$id";
        $data = mysqli_query($conexion,$query);
        $row_data = mysqli_fetch_assoc($data);
        $user = $row_data["nombre_usuario"];

        $query_image ="SELECT imagen_contribuciones FROM imagen_contribucion WHERE id_contribucion = $id";
        $data_image = mysqli_query($conexion,$query_image); 
        

        $query_correo ="SELECT correo_usuario FROM usuario WHERE nombre_usuario = '$user'";
        $data_correo = mysqli_query($conexion,$query_correo);
        $row_correo = mysqli_fetch_assoc($data_correo);
       
        $flag = true;
        
    ?>

    <body>
        <?php require("../navbar.php") ?>
        <div class="container">
            <div class="row">
                <div class="col fs-3">
                    <span class="">
                        <b>Nombre: </b> <?php echo $row_data["nombre_contribucion"];?>
                    </span>
                    <span class="d-flex">
                        <b class="me-1">Correo:</b> <?php echo $row_correo["correo_usuario"];?>
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
                    Descripción de la contribución:
                </span>
                <span style="text-align: justify;" class="text-justify d-flex text-break ">
                    <?php echo$row_data["descripcion_contribucion"]?>
                </span>
            </div>
            <div class="row">
                <?php
                    while($imagen = mysqli_fetch_assoc($data_image)){
                ?>
                    <?php if($flag){ ?>
                        <div class="fs-2 fw-bolder">
                            <?php $flag = false; ?>
                            Imágenes:
                        </div>
                    <?php } ?>
                    <div class="col">
                        <img style="max-width: 400px; max-height:400px;" class="shadow" src="data:;base64,<?php echo base64_encode($imagen["imagen_contribuciones"])?>">
                    </div>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt-5">
                <a href="../Contribucion" class="btn btn-primary">Volver al inicio</a>
            </div>
        </div>
        <?php require("../footer.php") ?>
    </body>
</html>