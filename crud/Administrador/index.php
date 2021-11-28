<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require("../header.php")?>
        <title>Administrador</title>
    </head>
    <body>
        <?php 
            require("../navbar.php");
        ?>
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="text-center">Ingresar Administrador</h1>
                    <form action="Consultas/create_administrador.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Nombre de administrador:</label>
                            <input class="form-control" rows="3" maxlength="50" placeholder="Usuario" name="nombre_usuario">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Contraseña de administrador:</label>
                            <input class="form-control" type="password" minlength="6" maxlength="16" placeholder="Contraseña" rows="3" name="contrasena">
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label fw-bolder">Rol del usuario:</label>
                            <input class="form-control" type="password" minlength="6" maxlength="16" placeholder="Rol del usuario" rows="3" name="rolUsuario">
                        </div> -->
                        <input type="submit" class="btn btn-secondary" value="Guardar">
                    </form>
                    <hr>
                    <table class="w-50">
                        <div class="row">
                            <div class="col-lg-12 text-center fs-2 fw-bolder mt-4 mb-4">
                                <span>Usuarios</span>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th>Nombre de Usuario</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $consulta ="SELECT * FROM usuario";
                                $resultado = mysqli_query($conexion, $consulta);

                                while($row = mysqli_fetch_assoc($resultado)){
                                    $nombre_usuario = $row["nombre_usuario"];
                                    $rol = $row["rol"];
                                    echo "<tr>";
                                    echo "<td>".$nombre_usuario."</td>";
                                    echo "<td>".$rol."</td>";
                                    ?>
                                    <td><a href='Consultas/delete_administrador.php?seleccionado=<?php echo$nombre_usuario?>'>
                                         <span class="material-icons" style="color: red;">
                                            delete
                                        </span>
                                    </a></td>
                                    <?php
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>