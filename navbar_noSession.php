<?php
    include("sesion_usuarios/auth.php");
?> 

<nav class="navbar bg-primary mb-4">
    <div class="container-fluid">   
        <a class="navbar-brand" href="index.php">
            <img src="/proyecto-municipalidad/crud/img/logo.png" style="width: 40%;">
        </a>
        <ul class="nav mx-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Noticias</a> <!-- Falta noticias a nivel sin usuario o usuario persona -->
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="user/ingreso_opinion.php">Opiniones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="user/ingreso_contribucion.php">Contribuciones</a>
            </li>
        </ul>
        <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-white"  href="acceso_usuarios.php">Inicio Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"  href="acceso_funcionarios.php">Acceso Funcionarios</a>
                </li>
            </ul>
    </div>
</nav>