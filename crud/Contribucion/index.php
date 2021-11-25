<?php
    require("../conexion.php");
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contribucion</title>
    <?php require("../header.php")?>
  </head>
  <body>
    <?php require("../navbar.php") ?>
    <div class="container">
        <table class ="w-100 table-light table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Departamento</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <div class="row">
                <div class="col-lg-12 text-center fs-2 fw-bolder mt-2 mb-4">
                    <span>Contribuciones</span>
                </div>
            </div>
            <?php
                $consulta = "SELECT * FROM contribucion";
                $resultado = mysqli_query($conexion, $consulta);

                while($row = mysqli_fetch_assoc($resultado)){
                    $nombre_contribucion = $row["nombre_contribucion"];
                    $correo_contribucion = $row["correo_contribucion"];
                    $departamento = $row["departamento"];
                    echo "<tr>";
                        echo "<th>".$nombre_contribucion."</th>";
                        echo "<th>".$correo_contribucion."</th>";
                        echo "<th>".$departamento."</th>";
                        ?>
                        <th class="ps-3">
                            <a href="ver_contribucion.php?id=<?php echo$row["id_contribucion"]?>" style="text-decoration: none;">
                                <span class="material-icons text-secondary">
                                    visibility
                                </span>
                            </a>
                            <a href="Consultas/delete_contribucion.php?id=<?php echo$row["id_contribucion"]?>" style="text-decoration: none;">
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
  </body>
</html>