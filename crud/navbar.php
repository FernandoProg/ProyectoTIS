<?php 

session_start();

if($_SESSION['tipoUsuario'] == "admin"){ ?>
    <nav class="navbar bg-black mb-4">
        <div class="container-fluid">   
            <a class="navbar-brand" href="../Administrador">
                <img src="../img/logo.png" style="width: 40%;">
            </a>
            <ul class="nav mx-auto">
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
                    <a class="nav-link text-white" href="../Opinion">Opiniones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../Contribucion">Contribuciones</a>
                </li>
            </ul>
            <ul class="nav justify-content-end">
            <li class="nav-item">
                    <a class="nav-link text-white"  href="../../sesion_usuarios/logout.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"  href="../..">Acceso Funcionarios</a>
                </li>
            </ul>
        </div>
    </nav>
<?php } 
    else{ ?>
      <nav class="navbar bg-primary mb-4">
        <div class="container-fluid">   
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" style="width: 40%;">
            </a>
            <ul class="nav mx-auto">
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
                    <a class="nav-link text-white" href="../Opinion">Opiniones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../Contribucion">Contribuciones</a>
                </li>
            </ul>
            <ul class="nav justify-content-end">
            <li class="nav-item">
                    <a class="nav-link text-white"  href="../../sesion_usuarios/logout.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"  href="../../sesion_usuarios/logout.php">Cerrar Sesión - <?php echo $_SESSION['nombre_usuario']; ?></a>
                </li>
            </ul>
        </div>
    </nav>
  
<?php } ?>