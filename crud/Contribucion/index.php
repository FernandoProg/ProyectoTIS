<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    
<!doctype html>
<html lang="es">
  <head>
    <!-- navbar -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- /navbar -->
    
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
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.js"></script>
    <script src="../main.js"></script>
    <?php require("../header.php")?>
   
  </head>
  <body>
    <?php require("../navbar.php") ?>
    <div class="container ">
        <div class="table-responsive">
            <table class ="w-100 table-light shadow-sm table-striped table table-bordered table-hover" id="myTable">
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
        <div class="chart-container mb-3 d-none d-sm-none d-md-block">
            <canvas id="graficoContribuciones" class="mb-3"></canvas>
            <button type="button" onclick="printJS({ printable: 'graficoContribuciones', type: 'html', documentTitle: 'Grafico de COntribuciones nuevas por mes'})">
                <i class="fas fa-file-pdf fa-3x"></i>
            </button>
            <span class="h1"> ¡Importante! </span>
            <span class="h4"> Para tablas muy anchas imprimir en "Apaisado".</span>
        </div>
    </div>
    
    <?php
        $query = "SELECT MONTH(fecha) AS fecha_event FROM contribucion";
        $query_data = mysqli_query($conexion,$query);
        $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0; $julio = 0; $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0; 
        while($fechas = mysqli_fetch_assoc($query_data)) 
            if($fechas["fecha_event"] == 1) $enero++;
            elseif($fechas["fecha_event"] == 2) $febrero++;
            elseif($fechas["fecha_event"] == 3) $marzo++;
            elseif($fechas["fecha_event"] == 4) $abril++;
            elseif($fechas["fecha_event"] == 5) $mayo++;
            elseif($fechas["fecha_event"] == 6) $junio++;
            elseif($fechas["fecha_event"] == 7) $julio++;
            elseif($fechas["fecha_event"] == 8) $agosto++;
            elseif($fechas["fecha_event"] == 9) $septiembre++;
            elseif($fechas["fecha_event"] == 10) $octubre++;
            elseif($fechas["fecha_event"] == 11) $noviembre++;
            elseif($fechas["fecha_event"] == 12) $diciembre++;
    ?>
    <script>
        let miGrafico = document.getElementById('graficoContribuciones').getContext('2d');
        Chart.defaults.font.size = 18;
        let ContribucionesPorMes = new Chart(graficoContribuciones, {
            type: 'bar',
            data:{
                labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets:[{
                    label: 'Cantidad de Contribuciones nuevas por mes',
                    data: [
                        <?php echo $enero ?>,
                        <?php echo $febrero ?>,
                        <?php echo $marzo ?>,
                        <?php echo $abril ?>,
                        <?php echo $mayo ?>,
                        <?php echo $junio ?>,
                        <?php echo $julio ?>,
                        <?php echo $agosto ?>,
                        <?php echo $septiembre ?>,
                        <?php echo $octubre ?>,
                        <?php echo $noviembre ?>,
                        <?php echo $diciembre ?>
                    ],
                    backgroundColor:[
                        'rgba(0, 255, 255, 0.8)',
                        'rgba(255, 228, 196, 0.8)',
                        'rgba(165, 42, 42, 0.8)',
                        'rgba(0, 0, 139, 0.8)',
                        'rgba(0, 100, 0, 0.8)',
                        'rgba(148, 0, 211, 0.8)',
                        'rgba(255, 215, 0, 0.8)',
                        'rgba(255, 69, 0, 0.8)',
                        'rgba(107, 142, 35, 0.8)',
                        'rgba(220, 220, 220, 0.8)',
                        'rgba(218, 165, 32, 0.8)',
                        'rgba(0, 255, 0, 0.8)'
                    ],
                    borderWidth:1,
                    borderColor:'#777',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:{
                plugins:{
                    title:{
                        display: true,
                        text: 'Cantidad de Contribuciones nuevas por mes',
                        font:{
                            size: 30
                        },
                        padding:{
                            bottom: 20,
                            top: 100
                        }
                    },
                    legend:{
                        display: false
                    }
                }
            }
        });
    </script>
    <?php require("../footer.php") ?>
  </body>
</html>