<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("../header.php")?>
    <title>Eventos - Administrador</title>
</head>
<body>
    <?php require("../navbar.php")?>
    <div class="container">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                INGRESAR EVENTO
            </span>
        </div>
        <div class="row">
            <form action="Consultas/insert_evento.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="id del lugar" class="form-label fw-bolder">Lugar</label>
                    <?php 
                        $lugar = "SELECT nombre_lugar,id_lugar FROM lugar";
                        $datalugar = mysqli_query($conexion,$lugar);
                    ?>
                    <select class="form-select" name="idLugar">
                        <option hidden selected>Seleccione el lugar</option>
                        <?php while($row = mysqli_fetch_assoc($datalugar)){?>
                            <option value="<?php echo$row["id_lugar"]?>"><?php echo$row["nombre_lugar"]?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre del evento" class="form-label fw-bolder">Nombre </label>
                    <input type="text" required class="form-control" name="nombreEvento" id="nombreEvento" aria-describedby="helpId" placeholder="Fiesta Bresh" maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label fw-bolder">Fecha </label>
                    <input type="date" required class="form-control" name="fechaEvento" id="fechaEvento" aria-describedby="helpId" placeholder="23-11-2021">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label fw-bolder" >Imágen </label>
                    <input type="file"  required class="form-control" name="imagenEvento" id="imagenEvento" aria-describedby="helpId" accept="image/png, .jpeg, .jpg .svg">
                </div>
                <div class="mb-3">
                    <label for="descripcion" required class="form-label fw-bolder">Descripción</label>
                    <textarea type="text" class="form-control" name="descripcionEvento" id="descripcionEvento"  placeholder="Este evento incluirá DJ's que vienen desde...el estilo de música será..." maxlength="1200"></textarea>
                    </div>
                <!-- <a href="?controlador=evento&accion=inicio" class="btn btn-primary">Volver al inicio</a> -->
                <div class="row w-25 mx-auto">
                    <input name="" id="" class="btn btn-secondary" type="submit" value="Agregar">
                </div>
            </form>
        </div>
    </div>
    <?php
        $consulta = "SELECT * FROM evento JOIN usuario USING(nombre_usuario)";
        $data = mysqli_query($conexion,$consulta);
    ?>
    <div class="container mt-4">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                EVENTOS
            </span>
        </div>
        <div class="row mt-4">
            <table class="table table-hover table-light table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Admin</th>
                        <th>ID Lugar</th>
                        <th>Nombre Evento</th>
                        <th>Fecha Evento</th>
                        <th>Imágen</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($data)) { ?>
                        <tr>
                        <td> <?php echo $row["id_evento"]; ?> </td>
                        <td> <?php echo $row["nombre_usuario"]; ?> </td>
                        <td> <?php echo $row["id_lugar"]; ?> </td>
                        <td> <?php echo $row["nombre_evento"]; ?> </td>
                        <td> <?php echo $row["fecha_evento"]; ?> </td>
                        <td> 
                            <img style="width:150px;"src="data:image;base64,<?php echo base64_encode($row["imagen_evento"]); ?> " alt="">
                            
                        </td>
                        <td> <?php echo $row["descripcion_evento"]; ?> </td>
                        <td class="text-center">
                            <a style="text-decoration: none;" href="editar.php?id=<?php echo $row["id_evento"];?>">
                                <span class="material-icons text-secondary">
                                    edit
                                </span>  
                            </a>
                            <a href="Consultas/delete_evento.php?id=<?php echo $row["id_evento"]; ?>" >
                                <span class="material-icons" style="color: red;">
                                    delete
                                </span>
                            </a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>