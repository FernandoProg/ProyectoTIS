<nav class="navbar bg-primary mb-4">
    <div class="container-fluid">   
        <a class="navbar-brand" href="../index_usuario.php">
            <img src="../crud/img/logo.png" style="width: 40%;">
        </a>
        <ul class="nav mx-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="view_noticias.php">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../user/ingreso_opinion.php">Opiniones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../user/ingreso_contribucion.php">Contribuciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="view_emprendedores.php">Emprendedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Mapa comuna</a>
            </li>
        </ul>
        <ul class="nav justify-content-end">
        <li class="nav-item">
                <a class="nav-link text-white"  href="../sesion_usuarios/logout.php">Cerrar Sesión - <?php echo $_SESSION['nombre_usuario']; ?></a>
            </li>
        </ul>
    </div>
</nav>