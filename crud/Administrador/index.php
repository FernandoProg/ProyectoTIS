
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
        <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous">
        </script>

        <title>Administradores</title>
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
                            <input class="form-control" rows="3" maxlength="50" placeholder="Usuario" name="nombre_usuario" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Contraseña de administrador:</label>
                            <input class="form-control" type="password" minlength="6" maxlength="16" placeholder="Contraseña" rows="3" name="contrasena" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder">Correo del administrador:</label>
                            <input type="email" class="form-control" rows="3" maxlength="50" placeholder="example@gmail.com" name="correo_usuario" required>
                        </div>
                        <input type="submit" class="btn btn-secondary" value="Guardar">
                    </form>
                    <hr>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 text-center fs-2 fw-bolder ">
                                <p class="mb-5">Usuarios Registrados</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class=" table table-hover table-bordered table-light" id="myTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 200px;" scope="col">Nombre de Usuario</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        //$consulta = ($rol=='')? "SELECT * FROM usuario LIMIT $inicio,$user_por_pagina" : "SELECT * FROM usuario WHERE rol = '$rol' LIMIT $inicio,$user_por_pagina";
                                        $consulta ="SELECT * FROM usuario";
                                        $resultado_user = mysqli_query($conexion, $consulta);
                                        while($row = mysqli_fetch_assoc($resultado_user)){
                                            $nombre_usuario = $row["nombre_usuario"];
                                            $rol_user = $row["rol"];
                                            $correo_usuario = $row["correo_usuario"];
                                            echo "<tr>";
                                            echo "<td>".$nombre_usuario."</td>";
                                            echo "<td>".$rol_user."</td>";
                                            echo "<td>".$correo_usuario."</td>";
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
                        </table>
                    </div>             
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