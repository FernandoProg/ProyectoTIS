
<!DOCTYPE html><?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>  
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("../header.php")?>
    <title>Municipalidad</title>
</head>
<body>
    <?php require("../navbar.php")?>
    <div class="container text-center">
        <span class="fs-2 fw-bolder">
            EDITAR EVENTO
        </span>
    </div>
    <div class="container mb-4">
        <div class="row">
            <?php
                $id = $_GET["id"];
                $sql = "SELECT * FROM evento join lugar using(id_lugar) WHERE id_evento=$id";
                $consulta = mysqli_query($conexion,$sql);
                $row = mysqli_fetch_assoc($consulta);
            ?>
            <form action="Consultas/update_evento.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo$row["id_evento"]?>">
                <div class="mb-3">
                    <label for="ID Lugar" class="form-label fw-bolder">Lugar:</label>
                    <?php 
                        $lugar = "SELECT nombre_lugar,id_lugar FROM lugar";
                        $datalugar = mysqli_query($conexion,$lugar);
                    ?>
                    <select class="form-select" name="idLugar">
                        <option value="<?php echo$row["id_lugar"]?>" hidden selected><?php echo$row["nombre_lugar"]?></option>
                        <?php while($rowlugar = mysqli_fetch_assoc($datalugar)){?>
                            <option value="<?php echo$rowlugar["id_lugar"]?>"><?php echo$rowlugar["nombre_lugar"]?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Nombre Evento" class="form-label fw-bolder">Nombre Evento:</label>
                    <input type="text" required class="form-control" value="<?php echo$row["nombre_evento"]?>" name="nombreEvento" id="nombreEvento" aria-describedby="emailHelpId" maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="Fecha Evento" class="form-label fw-bolder">Fecha Evento:</label>
                    <input type="date" required class="form-control" value="<?php echo$row["fecha_evento"] ?>" name="fechaEvento" id="fechaEvento" aria-describedby="emailHelpId" >
                </div>
                <div class="mb-3 ">
                    <label for="Imagen Evento" class="form-label fw-bolder">Imagen Evento:</label>
                    <input type="file" accept="image/png, .jpeg, .jpg .svg" class="form-control w-50 mb-2" value="" name="imagenEvento" id="imagenEvento" aria-describedby="emailHelpId">
                    <img style="width:150px;"src="data:image;base64,<?php echo base64_encode($row["imagen_evento"]); ?> " alt="">
                </div>
                <div class="mb-3">
                    <label for="Descripcion Evento" class="form-label fw-bolder">Descripcion Evento:</label>
                    <input type="text" required class="form-control" value="<?php echo$row["descripcion_evento"]?>" name="descripcionEvento" id="descripcionEvento" aria-describedby="emailHelpId" maxlength="1200">
                </div>
                <div class="row">
                    <div class="col-6 text-end">
                        <input name="" id="" class="btn btn-secondary" type="submit" value="Editar">
                    </div>
                    <div class="col-6">
                        <a href="../Evento" class="btn btn-primary">Volver al inicio</a>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>