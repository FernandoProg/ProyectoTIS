<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Emprendedores - Administrador</title>
    <script
    src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <?php require("../header.php")?>
</head>

<body>
<!--     <form action="Consultas_emprendedor/guardar_emprendedor.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nombre_emprendedor">
        <input type="text" name="direccion_emprendedor">
        <input type="text" name="celular_emprendedor">
        <input type="text" name="telefono_emprendedor">
        <input type="text" name="correo_emprendedor">
        <input type="text" name="rubro_emprendedor">
        <input type="file" accept="image/png, .jpeg, .jpg" name="imagen_emprendedor">
        <input type="submit" value="asd">
    </form> -->
    <?php require("../navbar.php") ?>
    <div class="container">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                INGRESAR EMPRENDEDOR
            </span>
        </div>
    </div>
    <form class="p-2" action="Consultas/guardar_emprendedor.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="form-label fw-bolder">Nombre:</label>
                    <input class=" form-control" type="text" name="nombre_emprendedor" maxlength="50" placeholder="Juan Perez"  required>
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Dirección:</label>
                    <input class=" form-control" type="text" name="direccion_emprendedor" maxlength="100" placeholder="Calle Siempre viva #742" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder">Celular:</label>
                    <input class="form-control" type="text" name="celular_emprendedor" maxlength="9" placeholder="912345678"required> 
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Teléfono:</label>
                    <input class="form-control" type="text" name="telefono_emprendedor" maxlength="7" placeholder="2567856"required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder">Correo:</label>
                    <input type="email" name="correo_emprendedor" placeholder="Example@gmail.com" maxlength="50" class="form-control" required>
                </div>
                <div class="col">
                    <?php
                        $sqlrubro = "SELECT nombre_rubro FROM rubro_emprendedor";
                        $datarubro= mysqli_query($conexion,$sqlrubro);
                    ?>
                    <label class="form-label fw-bolder">Rubro:</label>
                    <select class="form-select" name="rubro_emprendedor">
                        <option hidden selected>Seleccione el Rubro</option>
                        <?php while($row = mysqli_fetch_assoc($datarubro)){?>
                            <option value="<?php echo$row["nombre_rubro"]?>"><?php echo$row["nombre_rubro"]?></option>
                        <?php }?>
                    </select>
                    <span> ¿No encuentras el rubro que buscas? Ingresa uno <a class="" href="insertar_rubro.php">aquí</a>.</span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder">Usuario de Facebook:(opcional)</label>
                    <input class="form-control" type="text" name="facebook_emprendedor" maxlength="50" placeholder="Abarrotes juanito">
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Usuario de Instagram:(opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input class="form-control" type="text" name="instagram_emprendedor" maxlength="50" placeholder="Abarrotesjuanito">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder" >Información del emprendedor:</label>
                    <textarea placeholder="Aquí describa lo que realiza, precios, horarios, etc." name="informacion" class="form-control" cols="30" rows="10" maxlength="1000" required></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <label for="formFile" class="form-label fw-bolder">Seleccione una Imágen Representativa del Emprendedor:</label>
                    <input class="form-control"  accept="image/png, .jpeg, .jpg .svg" type="file" name="imagen_emprendedor" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12 col-md-6">
                    <label  class="form-label fw-bolder">Ingrese imágenes representativas de sus productos o empresa:</label>
                    <input class="form-control"  type="file" multiple name="imagenes_productos[]" id="" required>
                    <label class="">Se puede ingresar un máximo de 5 imagenes.</label>
                </div>
            </div>
            <div class="row w-25 mx-auto mt-4">
                <input class="btn btn-secondary " type="submit" value="Ingresar emprendedor">
            </div>
        </div>
    </form>

    <div class="container mt-5">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                EMPRENDEDORES
            </span>
        </div>
    </div>
    <?php
        require("../conexion.php");
        $consulta = "SELECT * FROM emprendedor";
        $data = mysqli_query($conexion,$consulta);
    ?>
    <div class="container">
        <div class="col-12">
            <table class="w-100 table-light table table-bordered table-hover" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Celular</th>
                        <th class="d-none d-sm-table-cell">Correo</th>
                        <th class="d-none d-sm-table-cell">Rubro</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php
                    while($fila=mysqli_fetch_assoc($data)){                        
                    ?>
                    <tr>
                        <th><?php echo$fila["nombre_emprendedor"] ?></th>
                        <th><?php echo$fila["direccion_emprendedor"]?></th>
                        <th><?php echo$fila["celular_emprendedor"]?></th>
                        <th class="d-none d-sm-table-cell"><?php echo$fila["correo_emprendedor"]?></th>
                        <th class="d-none d-sm-table-cell"><?php echo$fila["rubro_emprendedor"]?></th>
                        <th>
                            <div class="row ms-auto">
                                <div class="col">
                                    <a href="editar_emprendedor.php?id=<?php echo$fila["id_emprendedor"]?>" style="text-decoration: none;">
                                        <span class="material-icons text-secondary">
                                            edit
                                        </span>                                
                                    </a>
                                    <a href="Consultas/eliminar_emprendedor.php?id=<?php echo$fila["id_emprendedor"]?>" style="text-decoration: none;">
                                        <span class="material-icons" style="color: red;">
                                            delete
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <?php
                    }
                ?>
            </table>
        </div>
    </div>
  
    <?php require("../footer.php") ?>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "zeroRecords":    "No matching records found",
                "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],

            });
        } );
    </script>
</body>

</html>