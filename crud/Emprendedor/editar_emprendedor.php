<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar contribuciones - Administrador</title>
    <?php require("../header.php")?>
</head>
<?php
    require("../conexion.php");
    $id=$_GET["id"];
    $query = "SELECT * FROM emprendedor WHERE id_emprendedor=$id";
    $data = mysqli_query($conexion,$query);
    $row = mysqli_fetch_assoc($data); 
    $facebook= $row["facebook"];
    $instagram = $row["instagram"];
    $info = $row["informacion"];
    $imagen = $row["imagen_emprendedor"];
    $rubro_emprendedor = $row["rubro_emprendedor"];

    $query_image ="SELECT imagen_emprendedores FROM imagen_producto WHERE id_emprendedor = $id";
    $data_image = mysqli_query($conexion,$query_image); 
?>
<body>
    <?php require("../navbar.php") ?>
    <div class="container">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                EDITAR EMPRENDEDOR
            </span>
        </div>
    </div>
    <form class="p-2" action="Consultas/actualizar_emprendedor.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="form-label fw-bolder">Nombre:</label>
                    <input class="form-control w-100" type="text" name="nombre_emprendedor" value="<?php echo$row["nombre_emprendedor"]?>" required>
                </div>
                <div class="col">
                <label class="form-label fw-bolder">Dirección:</label>
                    <input type="text" name="direccion_emprendedor" class=" form-control w-100" value="<?php echo$row["direccion_emprendedor"]?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder">Celular:</label>
                   <input class=" form-control w-100" type="text" name="celular_emprendedor" placeholder="Celular" value="<?php echo$row["celular_emprendedor"] ?>" required> 
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Teléfono:</label>
                    <input class="form-control w-100" type="text" name="telefono_emprendedor" placeholder="Telefono" value="<?php echo$row["telefono_emprendedor"] ?>" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="col">
                        <label class="form-label fw-bolder">Correo:</label>
                        <input type="email" name="correo_emprendedor" placeholder="Correo" class="form-control" value="<?php echo$row["correo_emprendedor"] ?>" required>
                    </div>  
                </div>
                <div class="col">
                    <?php
                        $sqlrubro = "SELECT nombre_rubro FROM rubro_emprendedor";
                        $datarubro= mysqli_query($conexion,$sqlrubro);
                    ?>
                    <label class="form-label fw-bolder">Rubro:</label>
                    <select class="form-select" name="rubro_emprendedor">
                        <option hidden value ="<?php echo $rubro_emprendedor?>" selected><?php echo $rubro_emprendedor?></option>
                        <?php while($row = mysqli_fetch_assoc($datarubro)){?>
                            <option value="<?php echo$row["nombre_rubro"]?>"><?php echo $row["nombre_rubro"]?></option>
                        <?php }?>
                    </select>
                    <span> ¿No encuentras el rubro que buscas? Ingresa uno <a class="" href="insertar_rubro.php">aquí</a>.</span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder">Usuario de Facebook:(opcional)</label>
                    <input class="form-control" type="text" name="facebook_emprendedor" value="<?php echo $facebook?>" maxlength="50" required>
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Usuario de Instagram:(opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input class="form-control" type="text" name="instagram_emprendedor" value="<?php echo $instagram?>" maxlength="50" required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder" >Información del emprendedor:</label>
                    <textarea  name="informacion" class="form-control" cols="30" rows="10" required><?php echo $info?></textarea>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-sm-12 col-md-6 align-self-center ">
                        <label class="form-label  fw-bolder">Seleccione la imágen si desea cambiarla</label>
                        <input class="form-control w-75" accept="image/png, .jpeg, .jpg" type="file" name="imagen_emprendedor" >
                </div>
                <div class="col text-center">
                    <img class=" ms-auto img-fluid" style="width:250px;" src="data:image/jpeg;base64,<?php echo base64_encode($imagen)?>" >
                </div>
                
            </div>  
        </div>
        <div class="container mt-4">
            <div class="col-sm-12 col-md-6">
                <label  class="form-label fw-bolder">Ingrese imageneres representativas de sus productos:</label>
                <input class="form-control w-75"  type="file" multiple name="imagenes_productos[]" id="" >
                <label class="">Se puede ingresar un máximo de 5 imagenes.</label>
            </div>
            <div class="row">
                <?php
                    while($imagen = mysqli_fetch_assoc($data_image)){
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center mt-3">
                        <img style="width: 250px; height:250px;" class = "img-fluid" src="data:;base64,<?php echo base64_encode($imagen["imagen_emprendedores"])?>">
                    </div>
                <?php }?>
            </div>
        </div>
        <input type="hidden" name="id_emprendedor" value="<?php echo$id?>">
        <div class="row mt-4">
            <div class="col-6 text-end">
                <input class="btn btn-secondary" type="submit" value="Actualizar datos Emprendedor">
            </div>
            <div class="col-6">
                <a href="../Emprendedor" class="btn btn-primary">Volver atrás</a>  
            </div>
        </div>
    </form>
    <?php require("../footer.php") ?>
</body>
</html>