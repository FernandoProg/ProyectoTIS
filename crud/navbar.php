<style>
    a:hover {
    color:rgb(194, 190, 190) !important;
}
</style>

<?php 
if(!isset($_SESSION)){
    session_start();
}


if($_SESSION['rol'] == "admin"){ ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-black mb-4 shadow">

        <div class="container-fluid ms-3 pb-2">   
            <a class="navbar-brand" href="../Administrador"> <img src="../img/logo.png" style="width: 40%;"> </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">

                <ul class="navbar-nav">
                    <!-- <a class="navbar-brand" href="index.php"><img src="crud/img/logo.png" style="width: 40%;"></a> -->
                </ul>

                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="../Evento">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../Noticia">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../Emprendedor">Emprendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../Lugar">Mapa Comuna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../Contribucion">Contribuciones</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark btn btn-warning mt-2 " style="width: 230px;" href="../../sesion_usuarios/logout.php">Cerrar Sesión - <?php echo $_SESSION['nombre_usuario']; ?></a>
                    </li>
                </ul>

            </div>
            
        </div>
    </nav>
<?php } 
    else{ 
        header("Location: ../index.php");
    } ?>