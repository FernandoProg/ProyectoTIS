<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Emprendedores - Administrador</title>
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
                    <label class="form-label fw-bolder">Rubro:</label>
                    <select class="form-select" name="rubro_emprendedor">
                        <option hidden selected>Seleccione el Rubro</option>
                        <option value="Alimentos y bebestibles">Alimentos y bebestibles</option>
                        <option value="Ropa">Ropa</option>
                        <option value="Acicalamiento">Acicalamiento</option>
                        <option value="Entretenimiento">Entretenimiento</option>
                        <option value="Oficinas">Oficinas</option>
                        <option value="Administración de Viviendas">Administración de Viviendas</option>
                        <option value="Productora de eventos">Productora de eventos</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder">Usuario de Facebook:(opcional)</label>
                    <input class="form-control" type="text" name="facebook_emprendedor" maxlength="50" placeholder="Abarrotes juanito"required>
                </div>
                <div class="col">
                    <label class="form-label fw-bolder">Usuario de Instagram:(opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input class="form-control" type="text" name="instagram_emprendedor" maxlength="50" placeholder="Abarrotesjuanito"required>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label class="form-label fw-bolder" >Información del emprendedor:</label>
                    <textarea placeholder="Aquí describa lo que realiza, precios, horarios, etc." name="informacion" class="form-control" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="formFile" class="form-label fw-bolder">Seleccione una Imágen Representativa del Emprendedor:</label>
                    <input class="form-control"  accept="image/png, .jpeg, .jpg .svg" type="file" name="imagen_emprendedor" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                <label class="form-label fw-bolder">Descripción:</label>
                <textarea type="text" class="form-control" name="descripcion" id=""  placeholder="Mi negocio trata de..." maxlength="1000"></textarea>
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
            <table class="w-100 table-light table table-bordered table-hover">
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
</body>

</html>