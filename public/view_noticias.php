<?php
    if(!$_GET){
        header('Location:view_noticias.php?pagina=1');
    }
    require("../crud/conexion.php");
    $categoria = isset($_GET["categoria"]) ? $_GET["categoria"]:'';
    $fecha = isset($_GET["fecha"]) ? $_GET["fecha"]:'';
    $consulta = ($categoria=='')? "SELECT * FROM noticia" : "SELECT * FROM noticia WHERE nombre_categoria = '$categoria'";
    //$consulta = "SELECT * FROM noticia";
    $resultado = mysqli_query($conexion, $consulta);
    

    $cantidad_noticias = mysqli_num_rows($resultado);
    $noticias_por_pagina= 6;
    $paginas = ceil($cantidad_noticias/$noticias_por_pagina);
    $inicio= ($_GET['pagina']-1)*$noticias_por_pagina;
?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- navbar -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- /navbar -->
        <script
        src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
        crossorigin="anonymous">
        </script>
        <meta charset="UTF-8">
        <title>Noticias - Municipalidad</title>
        <?php require("../user/head.php")?>
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
                            NOTICIAS
                        </span>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-4">
                <div class="col-12">
                    
                        <form action="filtro_noticia.php" method="POST">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-3 ">

                                </div>
                                
                                <div class="col-sm-6 col-md-3 col-lg-3  ">
                                    <?php
                                            $sqlcategoria = "SELECT nombre_categoria FROM categoria_noticia";
                                            $datacategoria= mysqli_query($conexion,$sqlcategoria);
                                    ?>
                                    <label class="form-label fw-bolder d-block">Filtrar por categor??a:</label>
                                    <select class=" form-select d-inline shadow-sm"  name="categoria_noticia">
                                        <option hidden selected required></option>
                                        <option value="">Todas</option>
                                        <?php while($row = mysqli_fetch_assoc($datacategoria)){?>
                                            <option value="<?php echo$row["nombre_categoria"]?>"><?php echo$row["nombre_categoria"]?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class=" col-sm-6 col-md-3 col-lg-3 ">
                                    <label class="form-label fw-bolder d-block">Filtrar por fecha:</label>
                                    <select class=" form-select d-inline shadow-sm"   name="fecha_noticia">
                                        <option hidden selected required></option>
                                        <option value="">Todas</option>
                                        <option value="masreciente">Menos reciente</option>
                                        <option value="menosreciente">M??s reciente</option>
                                    </select>
                                </div>
                                <div class=" text-center col-sm-12 mt-4">
                                    <button class="btn btn-secondary" type="submit">Filtrar</button>
                                </div>
                            </div> 
                        </form>
                   
                </div>
            </div>

            <?php
                if($categoria=='' && $fecha ==''){
                    $sql_noticias = "SELECT * FROM noticia LIMIT $inicio,$noticias_por_pagina";

                }elseif($categoria == '' && $fecha != ''){
                    if($fecha == 'masreciente'){
                        $sql_noticias = "SELECT * FROM noticia ORDER BY fecha_noticia ASC LIMIT $inicio,$noticias_por_pagina "; 

                    }else{
                        $sql_noticias = "SELECT * FROM noticia ORDER BY fecha_noticia DESC LIMIT $inicio,$noticias_por_pagina "; 

                    }
                    
                }elseif($categoria != '' && $fecha == ''){
                    $sql_noticias = "SELECT * FROM noticia WHERE nombre_categoria = '$categoria' LIMIT $inicio,$noticias_por_pagina";  

                }elseif($categoria != '' && $fecha != ''){

                    if($fecha == 'masreciente'){
                        $sql_noticias = "SELECT * FROM noticia WHERE nombre_categoria = '$categoria' ORDER BY fecha_noticia ASC LIMIT $inicio,$noticias_por_pagina ";

                    }else{
                        $sql_noticias = "SELECT * FROM noticia WHERE nombre_categoria= '$categoria' ORDER BY fecha_noticia DESC LIMIT $inicio,$noticias_por_pagina "; 

                    }
                }
                //$sql_noticias = ($categoria=='')? "SELECT * FROM noticia LIMIT $inicio,$noticias_por_pagina" : "SELECT * FROM noticia WHERE categoria_noticia = '$categoria' LIMIT $inicio,$noticias_por_pagina";
                //$sql_noticias = 'SELECT * FROM noticia LIMIT '.(int)$inicio.','.(int)($noticias_por_pagina).'';
                //$sql_noticias = "SELECT * FROM noticia WHERE categoria_noticia = '$categoria' LIMIT $inicio,$noticias_por_pagina";
                $resultado_noticias = mysqli_query($conexion, $sql_noticias);

                $i = 1;
                while($row = mysqli_fetch_assoc($resultado_noticias)){
                    $get_titulo_noticia = $row["titulo_noticia"];
                    $get_fecha_noticia = $row["fecha_noticia"];
                    $get_lead_noticia = $row["lead_noticia"];
                    $get_bajada_noticia = $row["bajada_noticia"];
                    $get_cuerpo_noticia = $row["cuerpo_noticia"];
                    $get_categoria_noticia = $row["nombre_categoria"];
                    $get_imagen_noticia = $row["imagen_noticia"];
                    $id = $row["id_noticia"];   
                    
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
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($get_imagen_noticia)?>" alt="Card image cap" >
                                        <div class="card-body ">
                                            <h5 class="card-title"><?php echo $get_titulo_noticia?></h5>
                                            <p class="card-text"><?php echo $get_bajada_noticia?></p>
                                            
                                            <div class="row">
                                                <div class="mt-2 align-self-center col-6">
                                                    <a href="ver_noticia.php?seleccion=<?php echo $id ?>" class="btn btn-primary">Ver m??s</a>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <span> Categor??a: <?php echo $get_categoria_noticia ?></span>
                                                    <br>
                                                    <span>Fecha: <?php echo $get_fecha_noticia?></span>
                                                    <br>
                                                    <span class="visitas p-2 d-inline-block">
                                                        <span class="material-icons align-bottom">visibility</span>
                                                    <span class="fw-bolder"><?php echo$row["visitas_noticia"]?></span>
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
            <div class="mt-5 col-lg-12 " >
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" 
                            href="view_noticias.php?pagina=<?php if($_GET['pagina']-1==0){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']-1 ;} ?>&categoria=<?php echo $categoria ?>&fecha=<?php echo $fecha ?>">
                                Anterior
                            </a>
                    </li>

                        <?php for($j=1; $j<=$paginas; $j++): ?>
                        <li class="page-item <?php echo $_GET['pagina']==$j ? 'active' : '' ?>" >
                            <a class="page-link" href="view_noticias.php?pagina=<?php echo $j ?>&categoria=<?php echo $categoria ?>&fecha=<?php echo $fecha ?>">
                                <?php echo $j ?>
                            </a>
                        </li>
                        <?php endfor?>

                        <li class="page-item">
                            <a class="page-link" 
                            href="view_noticias.php?pagina=<?php if($_GET['pagina']+1>$paginas){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']+1 ;} ?>&categoria=<?php echo $categoria ?>&fecha=<?php echo $fecha ?>">
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