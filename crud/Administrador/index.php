<?php
    require("../conexion.php");
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
        <?php require("../navbar.php")?>
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="text-center">Ingresar Administrador</h1>
                    <form action="Consultas/create_administrador.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Nombre de administrador:</label>
                            <input class="form-control" rows="3" maxlength="50" placeholder="Usuario" name="nombre_admin">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Contraseña de administrador:</label>
                            <input class="form-control" type="password" minlength="6" maxlength="16" placeholder="Contraseña" rows="3" name="contrasena">
                        </div>
                        <input type="submit" class="btn btn-secondary" value="Guardar">
                    </form>
                    <hr>
                    <table class="w-50">
                        <div class="row">
                            <div class="col-lg-12 text-center fs-2 fw-bolder mt-4 mb-4">
                                <span>Administradores</span>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <th>Nombre de Administrador</th>
                                <th>Contraseña Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $consulta ="SELECT * FROM administrador";
                                $resultado = mysqli_query($conexion, $consulta);

                                while($row = mysqli_fetch_assoc($resultado)){
                                    $nombre_admin = $row["nombre_admin"];
                                    $contrasena = $row["contraseña"];
                                    echo "<tr>";
                                    echo "<td>".$nombre_admin."</td>";
                                    echo "<td>".$contrasena."</td>";
                                    ?>
                                    <td><a href='Consultas/delete_administrador.php?seleccionado=<?php echo$nombre_admin?>'>
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