<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registro Usuario - Municipalidad</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <?php
    require('../crud/conexion.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\Exception;

    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/Exception.php');
    require('PHPMailer/src/SMTP.php');
    $objetoMail = new PHPMailer();

    $objetoMail->isSMTP();
    $objetoMail->Host = 'smtp.mailtrap.io';
    $objetoMail->Username = '0e0575b7a8ae09';
    $objetoMail->Password = '7cdcaee7d0820e';

    $objetoMail->SMTPAuth = true;
    $objetoMail->SMTPSecure = 'tls';
    $objetoMail->Port = '2525';
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $randstring = generateRandomString();

    // If form submitted, insert values into the database.
    if (isset($_REQUEST['nombreUsuario'])) {
        $nombreUsuario = stripslashes($_REQUEST['nombreUsuario']); // removes backslashes
        $nombreUsuario = mysqli_real_escape_string($conexion, $nombreUsuario); //escapes special characters in a string

        $query = "SELECT correo_usuario,nombre_usuario FROM usuario where nombre_usuario = '$nombreUsuario'";
        $result = mysqli_query($conexion, $query);




        if ($result) {
            //Cambia la contraseña del usuario por la random
            $query2 = "UPDATE usuario SET contraseña = '" . md5($randstring) . "' WHERE nombre_usuario = '$nombreUsuario'";
            $result2 = mysqli_query($conexion, $query2);


            /**PRUEBAS CORREO */
            $objetoMail->From = 'munichanaral@municipio.cl'; //Remitente
            $objetoMail->addAddress(mysqli_fetch_assoc($result)['correo_usuario']); //Destinatario
            $objetoMail->Subject = "Recuperar contraseña"; //Asunto
            $objetoMail->Body = "Esta es tu nueva contraseña : " . $randstring . " para cambiarla ingrese al sitio web , presione acceder  y luego cambiar contraseña."; //Destinatario

            if ($objetoMail->send() == false) {
                echo "No se pudo enviar el email...";
                // echo $objetoMail->ErrorInfo;
            } else {
                echo '<div class="alert alert-success container mt-5" role="alert">';
                echo 'Te hemos enviado un correo para recuperar tu contraseña.';
                echo '</div>';
            }
    ?>




        <?php

        }
    } else {
        ?>
        <form class="form container mt-5 mb-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                <input type="text" required class="form-control" id="exampleInputEmail1" placeholder="JuanPerez1 , felipeBurgos14 , JuanFarias , etc..." name="nombreUsuario" maxlength="50">
                <div id="UsernameHelp" class="form-text">Recuerda que no podrás cambiar tu nombre usuario posteriormente.</div>
            </div>
            <button type="submit" class="btn btn-primary">Registrarme</button>
            <a href="login_usuario.php" class="btn btn-secondary">Volver atrás</a>
        </form>
    <?php }
    require("../footer.php"); ?>
</body>

</html>