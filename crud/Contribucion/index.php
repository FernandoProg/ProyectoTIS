<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contribuciones - Administrador</title>
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
    <?php require("../navbar.php") ?>
    <div class="container">
        <table class ="w-100 table-light table table-bordered table-hover" id="myTable">
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
                $consulta = "SELECT * FROM contribucion JOIN usuario USING(nombre_usuario)";
                $resultado = mysqli_query($conexion, $consulta);

                while($row = mysqli_fetch_assoc($resultado)){
                    $nombre_contribucion = $row["nombre_contribucion"];
                    $correo_contribucion = $row["correo_usuario"];
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
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "zeroRecords":    "No matching records found",
                "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],

            });
        } );
    </script>
    <?php require("../footer.php") ?>
  </body>
</html>