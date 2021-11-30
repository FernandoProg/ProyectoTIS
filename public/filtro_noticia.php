<?php
    $categoria = $_POST["categoria_noticia"];
    echo $categoria;
    $fecha = $_POST["fecha_noticia"];
    echo $fecha;
    header("Location: view_noticias.php?fecha=".$fecha."&categoria=".$categoria."&pagina=1");
?>