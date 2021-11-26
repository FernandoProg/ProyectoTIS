<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <?php
      require('crud/conexion.php');
         // If form submitted, insert values into the database.
         if (isset($_REQUEST['nombreUsuario'])){
      	$nombreUsuario = stripslashes($_REQUEST['nombreUsuario']); // removes backslashes
      	$nombreUsuario = mysqli_real_escape_string($conexion,$nombreUsuario); //escapes special characters in a string
        
      	$contraseñaUsuario = stripslashes($_REQUEST['contraseña']);
      	$contraseñaUsuario = mysqli_real_escape_string($conexion,$contraseñaUsuario);
      
        $query = "INSERT into `usuario` (nombre_usuario, contraseña, rol) VALUES ('$nombreUsuario', '".md5($contraseñaUsuario)."', 'usuario')";
        $result = mysqli_query($conexion,$query);
		
        if($result){
            echo "<div class='form'><h3>Te has registrado correctamente!</h3><br/>Haz click aquí para <a href='login_usuario.php'>Logearte</a></div>";
        }
        }else{
      ?>
    <div class="form">
      <h1>Registrate Aquí</h1>
      <form name="registration" action="" method="post">
        <input type="text" name="nombreUsuario" placeholder="Usuario" required />
        <input type="password" name="contraseña" placeholder="Contraseña" required />
        <input type="submit" name="submit" value="Registrarse" />
      </form>
    </div>
    <?php } ?>
  </body>
</html>


