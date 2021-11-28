<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
         crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
    <title>Municipalidad</title>
</head>
<body class="img-fondo">
    <?php
        require('crud/conexion.php');
        session_start();
        if (isset($_POST['nombre_usuario'])){
            $nombreUsuario = stripslashes($_REQUEST['nombre_usuario']); // removes backslashes
            $nombreUsuario = mysqli_real_escape_string($conexion,$nombreUsuario); //escapes special characters in a string
            
            $contraseñaUsuario = stripslashes($_REQUEST['contrasena']);
            $contraseñaUsuario = mysqli_real_escape_string($conexion,$contraseñaUsuario);
            
        //Checking is user existing in the database or not
            $query = "SELECT nombre_usuario,contraseña,rol FROM `usuario` WHERE nombre_usuario='$nombreUsuario' and contraseña='".md5($contraseñaUsuario)."' ";
            $result = mysqli_query($conexion,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if($rows == 1 && mysqli_fetch_assoc($result)['rol'] == "admin"){
                $_SESSION['nombre_usuario'] = $nombreUsuario;
                $_SESSION['rol'] = "admin";
                header("Location: crud/Administrador/index.php"); // Redirect user to index.php
            }else{
                ?>
                <div class="container bg-black pb-3 mt-5 fondo-redondeado">
                    <div class="row">
                        <div class="row col-lg-8 offset-lg-2 mt-4">
                            <div class="col-6 text-end">
                                <img src="crud/img/logo.png" alt="Logo municipalidad">
                            </div>
                            <div class="col-6 text-start align-middle">
                                <span class="d-flex pt-5 text-white fw-bolder">Municipalidad</span>
                                <span class="d-flex pt-2 text-white fw-bolder">de Chiguayante</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center mt-4">
                            <h1 class="text-center text-white">Ingreso - Administrador</h1>
                            <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label fw-bolder text-white">Nombre de administrador:</label>
                                <input class="form-control" rows="3" maxlength="50" placeholder="Admin" name="nombre_usuario">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bolder text-white">Contraseña de administrador:</label>
                                <input class="form-control" type="password" minlength="6" maxlength="16" placeholder="Password" rows="3" name="contrasena">
                            </div>
                            <input type="submit" class="btn btn-secondary" value="Ingresar">
                            <a href="index.php" class="btn btn-primary">Volver al inicio</a>
                        </form>
                    </div>
                </div>
                <?php echo "<div class='form text-center text-white mt-2'><h3>Usuario/Contraseña Incorrecto</h3>Haz click aquí para <a href='acceso_funcionarios.php'>Logearte</a></div>";
            }
        }else{
            ?>
            <div class="container bg-black pb-3 mt-5 fondo-redondeado">
            <div class="row">
                <div class="row col-lg-8 offset-lg-2 mt-4">
                    <div class="col-6 text-end">
                        <img src="crud/img/logo.png" alt="Logo municipalidad">
                    </div>
                    <div class="col-6 text-start align-middle">
                        <span class="d-flex pt-5 text-white fw-bolder">Municipalidad</span>
                        <span class="d-flex pt-2 text-white fw-bolder">de Chiguayante</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center mt-4">
                <h1 class="text-center text-white">Ingreso - Administrador</h1>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bolder text-white">Nombre de administrador:</label>
                            <input class="form-control" rows="3" maxlength="50" placeholder="Admin" name="nombre_usuario">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bolder text-white">Contraseña de administrador:</label>
                            <input class="form-control" type="password" minlength="6" maxlength="16" placeholder="Password" rows="3" name="contrasena">
                        </div>
                        <input type="submit" class="btn btn-secondary" value="Ingresar">
                        <a href="index.php" class="btn btn-primary">Volver al inicio</a>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </body>
</html>