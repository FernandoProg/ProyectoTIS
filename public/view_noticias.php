<?php
    if(!$_GET){
        header('Location:view_noticias.php?pagina=1');
    }
    require("../crud/conexion.php");
    $categoria = isset($_GET["categoria"]) ? $_GET["categoria"]:'';
    $fecha = isset($_GET["fecha"]) ? $_GET["fecha"]:'';
    $consulta = ($categoria=='')? "SELECT * FROM noticia" : "SELECT * FROM noticia WHERE categoria_noticia = '$categoria'";
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
        <meta charset="UTF-8">
        <title>Noticias - Municipalidad</title>
        <?php require("../user/head.php")?>
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
                                <div class="col-6 text-end">
                                    <label class="form-label fw-bolder d-block">Filtrar por categoría:</label>
                                    <select class="w-25 form-select d-inline" name="categoria_noticia">
                                        <option hidden selected required></option>
                                        <option value=""></option>
                                        <option value="Política">Política</option>
                                        <option value="Deportiva">Deportiva</option>
                                        <option value="Económica">Económica</option>
                                        <option value="Cultural">Cultural</option>
                                        <option value="Social">Social</option>
                                        <option value="Policial">Policial</option>
                                        <option value="Científica">Científica</option>
                                    </select>
                                </div>
                                <div class=" col-6">
                                    <label class="form-label fw-bolder d-block">Filtrar por fecha:</label>
                                    <select class="w-25 form-select d-inline" name="fecha_noticia">
                                        <option hidden selected required></option>
                                        <option value=""></option>
                                        <option value="masreciente">Menos reciente</option>
                                        <option value="menosreciente">Más reciente</option>
                                    </select>
                                </div>
                                <div class=" text-center col-12 mt-4">
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
                    $sql_noticias = "SELECT * FROM noticia WHERE categoria_noticia = '$categoria' LIMIT $inicio,$noticias_por_pagina";  

                }elseif($categoria != '' && $fecha != ''){

                    if($fecha == 'masreciente'){
                        $sql_noticias = "SELECT * FROM noticia WHERE categoria_noticia = '$categoria' ORDER BY fecha_noticia ASC LIMIT $inicio,$noticias_por_pagina ";

                    }else{
                        $sql_noticias = "SELECT * FROM noticia WHERE categoria_noticia = '$categoria' ORDER BY fecha_noticia DESC LIMIT $inicio,$noticias_por_pagina "; 

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
                    $get_categoria_noticia = $row["categoria_noticia"];
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
                                                <div class="mt-2 col-6">
                                                    <a href="ver_noticia.php?seleccion=<?php echo $id ?>" class="btn btn-primary">Ver más</a>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <span> Categoría: <?php echo $get_categoria_noticia ?></span>
                                                    <br>
                                                    <span>Fecha: <?php echo $get_fecha_noticia?></span>
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