<?php
    if(!$_GET){
        header('Location:view_eventos.php?pagina=1');
    }
    require("../crud/conexion.php");
    $consulta =  "SELECT id_evento FROM evento" ;
    $resultado = mysqli_query($conexion, $consulta);
    $cantidad_eventos = mysqli_num_rows($resultado);
    $eventos_por_pagina= 6;
    $paginas = ceil($cantidad_eventos/$eventos_por_pagina);
    $inicio= ($_GET['pagina']-1)*$eventos_por_pagina;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Eventos - Municipalidad</title>
        <?php require("../user/head.php")?>
        <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous">
        </script>
        <script src="main.js"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <?php
        require_once("navbar_user.php");
    ?>
        <div class="container-fluid">
            <div>
                <div class="container mt-4">
                    <div class="row text-center">
                        <span class="fs-2 fw-bolder">
                            EVENTOS
                        </span>
                    </div>
                </div>
            </div>


            <?php
                $sql_noticias =  "SELECT id_evento,nombre_evento,descripcion_evento,imagen_evento,visitas_evento FROM evento LIMIT $inicio,$eventos_por_pagina";
                $resultado_noticias = mysqli_query($conexion, $sql_noticias);

                $i = 1;
                while($row = mysqli_fetch_assoc($resultado_noticias)){
                    $nombreEvento = $row["nombre_evento"];
                    $descripcionEvento = $row["descripcion_evento"];
                    $imagenEvento= $row["imagen_evento"];
                    $idEvento = $row["id_evento"];   
                    
                    if($i == 1){
                        ?>
                        <div class="container-fluid">
                            <div class="row"> 
                        <?php
                        $i++;
                    };
                    ?>
                                <div class="mt-4 col-lg-4 col-sm-12">
                                    <div class="card shadow">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($imagenEvento)?>" alt="Card image cap" >
                                        <div class="card-body ">
                                            <h5 class="card-title"><?php echo $nombreEvento?></h5>
                                            <p class="card-text" style="display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            text-overflow: ellipsis;">
                                            <?php echo $descripcionEvento?>
                                            </p>
                                            
                                            <div class="row">
                                                <div class="col d-inline">
                                                    <a href="ver_evento.php?seleccion=<?php echo $idEvento ?>" class="btn btn-primary">Ver más</a>
                                                </div>
                                                <div class="col text-end" >
                                                    <span class="visitas p-3 d-inline-block">
                                                        <span class="material-icons align-bottom">visibility</span>
                                                        <span class="fw-bolder"><?php echo$row["visitas_evento"]?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                } 
                ?>
                            </div>
                        </div>
            <!-- ------------------------------------------------------------------------------------------- -->
            <div class="mt-5 col-lg-12" >
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" 
                            href="view_eventos.php?pagina=<?php if($_GET['pagina']-1==0){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']-1 ;} ?>">
                                Anterior
                            </a>
                    </li>
                        <?php for($j=1; $j<=$paginas; $j++): ?>
                        <li class="page-item <?php echo $_GET['pagina']==$j ? 'active' : '' ?>" >
                            <a class="page-link" href="view_eventos.php?pagina=<?php echo $j ?>">
                                <?php echo $j ?>
                            </a>
                        </li>
                        <?php endfor?>
                        <li class="page-item">
                            <a class="page-link" 
                            href="view_eventos.php?pagina=<?php if($_GET['pagina']+1>$paginas){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']+1 ;} ?>">
                                Siguiente
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <?php require("../footer.php"); ?>
    </body>
</html>