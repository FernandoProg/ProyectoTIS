<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Opiniones - Administrador</title>
    <?php require("../header.php")?>
</head>
<body>
    <?php require("../navbar.php")?>
    <?php
        require("../conexion.php");
        $query = "SELECT id_opinion,nombre_opinion,correo_usuario,fecha_opinion FROM opinion JOIN usuario USING(nombre_usuario) ORDER BY fecha_opinion";
        $data = mysqli_query($conexion,$query);
    ?>
    <div class="container">
        <div class="row">
            <span class="fs-2 fw-bolder text-center">
                OPINIONES
            </span>
        </div>
        <div class="row table-responsive mt-4">
            <table class="w-100 table-hover table-light table table-bordered">   
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo de contacto</th>
                        <th>Fecha de Subida</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php
                    while($fila=mysqli_fetch_assoc($data)){
                ?>
                    <tr>
                        <th><?php echo$fila["nombre_opinion"]?></th>
                        <th><?php echo$fila["correo_usuario"]?></th>
                        <th><?php echo$fila["fecha_opinion"]?></th>
                        <th class="ps-3">
                            <a href="ver_opinion.php?id=<?php echo$fila["id_opinion"]?>" style="text-decoration: none;">
                                <span class="material-icons text-secondary">
                                    visibility
                                </span>
                            </a>
                            <a href="Consultas/eliminar_opinion.php?id=<?php echo$fila["id_opinion"]?>" style="text-decoration: none;">
                                <span class="material-icons" style="color: red;">
                                        delete
                                </span>
                            </a>
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