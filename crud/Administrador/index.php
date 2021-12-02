
<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
    if(!$_GET){
        header('Location:index.php?pagina=1');
    }
    $rol = isset($_GET["rol"]) ? $_GET["rol"]:'';
    $consulta = ($rol=='')? "SELECT * FROM usuario" : "SELECT * FROM usuario WHERE rol = '$rol'";
    $resultado = mysqli_query($conexion, $consulta);
    $cantidad_user = mysqli_num_rows($resultado);
    $user_por_pagina= 10;
    $paginas = ceil($cantidad_user/$user_por_pagina);
    $inicio= ($_GET['pagina']-1)*$user_por_pagina;

    
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
        <script src="main_admin.js"></script>
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
                                        $consulta = ($rol=='')? "SELECT * FROM usuario LIMIT $inicio,$user_por_pagina" : "SELECT * FROM usuario WHERE rol = '$rol' LIMIT $inicio,$user_por_pagina";
                                        //$consulta ="SELECT * FROM usuario LIMIT $inicio,$user_por_pagina";
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
                    <div class="mt-5 col-lg-12" >
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" 
                                    href="index.php?pagina=<?php if($_GET['pagina']-1==0){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']-1 ;} ?>&rol=<?php echo $rol ?>">
                                        Anterior
                                    </a>
                                </li>
                                <?php for($j=1; $j<=$paginas; $j++): ?>
                                <li class="page-item <?php echo $_GET['pagina']==$j ? 'active' : '' ?>" >
                                    <a class="page-link" href="index.php?pagina=<?php echo $j ?>&rol=<?php echo $rol ?>">
                                        <?php echo $j ?>
                                    </a>
                                </li>
                                <?php endfor?>
                                <li class="page-item">
                                    <a class="page-link" 
                                    href="index.php?pagina=<?php if($_GET['pagina']+1>$paginas){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']+1 ;} ?>&rol=<?php echo $rol ?>">
                                        Siguiente
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
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