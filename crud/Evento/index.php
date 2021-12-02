<?php
    require("../conexion.php");
    include("../../sesion_usuarios/auth_admin.php");
?>    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("../header.php")?>
    <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.js"></script>
    <title>Eventos - Administrador</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php require("../navbar.php")?>
    <div class="container">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                INGRESAR EVENTO
            </span>
        </div>
        <div class="row">
            <form action="Consultas/insert_evento.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="id del lugar" class="form-label fw-bolder">Lugar</label>
                    <?php 
                        $lugar = "SELECT nombre_lugar,id_lugar FROM lugar";
                        $datalugar = mysqli_query($conexion,$lugar);
                    ?>
                    <select class="form-select" name="idLugar">
                        <option hidden selected>Seleccione el lugar</option>
                        <?php while($row = mysqli_fetch_assoc($datalugar)){?>
                            <option value="<?php echo$row["id_lugar"]?>"><?php echo$row["nombre_lugar"]?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre del evento" class="form-label fw-bolder">Nombre </label>
                    <input type="text" required class="form-control" name="nombreEvento" id="nombreEvento" aria-describedby="helpId" placeholder="Fiesta Bresh" maxlength="50">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label fw-bolder">Fecha </label>
                    <input type="date" required class="form-control" name="fechaEvento" id="fechaEvento" aria-describedby="helpId" placeholder="23-11-2021">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label fw-bolder" >Imágen </label>
                    <input type="file"  required class="form-control" name="imagenEvento" id="imagenEvento" aria-describedby="helpId" accept="image/png, .jpeg, .jpg .svg">
                </div>
                <div class="mb-3">
                    <label for="descripcion" required class="form-label fw-bolder">Descripción</label>
                    <textarea type="text" class="form-control" name="descripcionEvento" id="descripcionEvento"  placeholder="Este evento incluirá DJ's que vienen desde...el estilo de música será..." maxlength="1200"></textarea>
                    </div>
                <!-- <a href="?controlador=evento&accion=inicio" class="btn btn-primary">Volver al inicio</a> -->
                <div class="row w-25 mx-auto">
                    <input name="" id="" class="btn btn-secondary" type="submit" value="Agregar">
                </div>
            </form>
        </div>
    </div>
    <?php
        $consulta = "SELECT * FROM evento JOIN usuario USING(nombre_usuario)";
        $data = mysqli_query($conexion,$consulta);
    ?>
    <div class="container mt-4">
        <div class="row text-center">
            <span class="fs-2 fw-bolder">
                EVENTOS
            </span>
        </div>
        <div class="row mt-4 container">
            <table class="table table-hover table-light table-bordered" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Admin</th>
                        <th>ID Lugar</th>
                        <th>Nombre Evento</th>
                        <th>Fecha Evento</th>
                        <th>Imágen</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=mysqli_fetch_assoc($data)) { ?>
                        <tr>
                        <td> <?php echo $row["id_evento"]; ?> </td>
                        <td> <?php echo $row["nombre_usuario"]; ?> </td>
                        <td> <?php echo $row["id_lugar"]; ?> </td>
                        <td> <?php echo $row["nombre_evento"]; ?> </td>
                        <td> <?php echo $row["fecha_evento"]; ?> </td>
                        <td> 
                            <img style="width:150px;"src="data:image;base64,<?php echo base64_encode($row["imagen_evento"]); ?> " alt="">
                            
                        </td>
                        <td> <?php echo $row["descripcion_evento"]; ?> </td>
                        <td class="text-center">
                            <a style="text-decoration: none;" href="editar.php?id=<?php echo $row["id_evento"];?>">
                                <span class="material-icons text-secondary">
                                    edit
                                </span>  
                            </a>
                            <a href="Consultas/delete_evento.php?id=<?php echo $row["id_evento"]; ?>" >
                                <span class="material-icons" style="color: red;">
                                    delete
                                </span>
                            </a>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <canvas id="graficoEventos"></canvas>
        </div>
    </div>
        <script>
        $(document).ready( function () {
        $('#myTable').DataTable({
            "zeroRecords":    "No matching records found",
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],


        });
        } );
        </script>
        <?php
            $query = "SELECT MONTH(fecha_evento) AS fecha_event FROM evento";
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
            let miGrafico = document.getElementById('graficoEventos').getContext('2d');
            Chart.defaults.font.size = 18;
            let EventosPorMes = new Chart(graficoEventos, {
                type: 'bar',
                data:{
                    labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    datasets:[{
                        label: 'Cantidad de eventos',
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
                option:{}
            });
        </script>
    <?php require("../footer.php") ?>
</body>
</html>