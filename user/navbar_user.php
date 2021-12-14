<?php
    include("../sesion_usuarios/auth.php");
?> 
<style>
    a:hover {
    color:rgb(194, 190, 190) !important;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid  ">
        <a class="navbar-brand" href="../index.php"><img src="../crud/img/logo.png" style="width: 40%;"></a>

        <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
            <ul class="navbar-nav">
                
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link text-white  " aria-current="" href="../public/view_noticias.php">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="ingreso_contribucion.php">Contribuciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../public/view_eventos.php">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../public/view_emprendedores.php">Emprendedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../public/view_mapa.php">Mapa Comuna</a>
                </li>
            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <i class="fas fa-bell"></i>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"  href="../sesion_usuarios/logout.php">Cerrar Sesión - <?php echo $_SESSION['nombre_usuario']; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>