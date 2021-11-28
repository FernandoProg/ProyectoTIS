<?php
    require("../crud/conexion.php");
    

    $consulta = "SELECT * FROM noticia";
    $resultado = mysqli_query($conexion, $consulta);


    $cantidad_noticias = mysqli_num_rows($resultado);
    $noticias_por_pagina= 6;
    $paginas = ceil($cantidad_noticias/$noticias_por_pagina);

?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Municipalidad</title>
        <?php require("../user/head.php")?>
    </head>
    <body>
        <?php require("navbar_noSession.php");?> 

        <?php
            if(!$_GET){
                header('Location:view_noticias.php?pagina=1');
            }
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
                <div class="row">
                    <div class="col">
                            <label class="form-label fw-bolder d-block">Filtrar por categoría:</label>
                            <select class="w-25 form-select d-inline" id="rubro" name="categoria_noticia">
                                <option hidden selected required>Seleccione la categoria</option>
                                <option value="Política">Política</option>
                                <option value="Deportiva">Deportiva</option>
                                <option value="Económica">Económica</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Social">Social</option>
                                <option value="Policial">Policial</option>
                                <option value="Científica">Científica</option>
                            </select>
                            <a id="link" class="btn  btn-secondary mb-1 d-inline-flex" href="#">Filtrar</a>
                    </div>
                </div>
            </div>

            <?php
                if(!$_GET){
                    header('Location:view_noticias.php?pagina=1');
                }

                $inicio= ($_GET['pagina']-1)*$noticias_por_pagina;

                $sql_noticias = 'SELECT * FROM noticia LIMIT '.(int)$inicio.','.(int)($noticias_por_pagina).'';

                $resultado_noticias = mysqli_query($conexion, $sql_noticias);

                $consulta = "SELECT * FROM noticia";
                $resultado = mysqli_query($conexion, $consulta);
    
                $cantidad_noticias = mysqli_num_rows($resultado);
                $noticias_por_pagina= 6;
                $paginas = ceil($cantidad_noticias/$noticias_por_pagina);

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
                                    <div class="card ">
                                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($get_imagen_noticia)?>" alt="Card image cap" >
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $get_titulo_noticia?></h5>
                                            <p class="card-text"><?php echo $get_bajada_noticia?></p>
                                            <a href="ver_noticia.php?seleccion=<?php echo $id ?>" class="btn btn-primary">Ver más</a>
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
                            href="view_noticias.php?pagina=<?php if($_GET['pagina']-1==0){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']-1 ;} ?>">
                                Anterior
                            </a>
                    </li>

                        <?php for($j=1; $j<=$paginas; $j++): ?>
                        <li class="page-item <?php echo $_GET['pagina']==$j ? 'active' : '' ?>" >
                            <a class="page-link" href="view_noticias.php?pagina=<?php echo $j ?>">
                                <?php echo $j ?>
                            </a>
                        </li>
                        <?php endfor?>

                        <li class="page-item">
                            <a class="page-link" 
                            href="view_noticias.php?pagina=<?php if($_GET['pagina']+1>$paginas){ echo $_GET['pagina'] ;}else{ echo $_GET['pagina']+1 ;} ?>">
                                Siguiente
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            



        </div>
        



    </body>
</html>