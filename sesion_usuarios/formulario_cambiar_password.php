<!doctype html>
<html lang="en">

<head>
    <title>Cambiar contraseña</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php
    require('../crud/conexion.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_POST['contraseña1']) and isset($_POST['contraseña2'])) {
        if ($_POST['contraseña1'] ==  $_POST['contraseña2']) {
            $nombreUsuario = $_SESSION['nombre_usuario'];
            $contraseñaNueva = $_POST['contraseña1'];
            $query2 = "UPDATE usuario SET contraseña = '" . md5($contraseñaNueva) . "' WHERE nombre_usuario = '$nombreUsuario'";
            $result2 = mysqli_query($conexion, $query2);
        } else {
            print_r("distintas");
        }
    }
    ?>
    <form class="container mt-5" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
            <input type="email" readonly class="form-control" id="exampleInputEmail1" name="nombre_usuario" aria-describedby="emailHelp" value=<?php echo $_SESSION['nombre_usuario'] ?>>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nueva contraseña</label>
            <input type="password" required class="form-control" id="exampleInputPassword1" name="contraseña1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Repita su nueva contraseña</label>
            <input type="password" required class="form-control" id="exampleInputPassword1" name="contraseña2">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>