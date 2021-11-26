<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
      require('crud\conexion.php');
      session_start();
         if (isset($_POST['nombreUsuario'])){
        
        $nombreUsuario = stripslashes($_REQUEST['nombreUsuario']); // removes backslashes
      	$nombreUsuario = mysqli_real_escape_string($conexion,$nombreUsuario); //escapes special characters in a string
        
      	$contraseñaUsuario = stripslashes($_REQUEST['contraseña']);
      	$contraseñaUsuario = mysqli_real_escape_string($conexion,$contraseñaUsuario);
      	
      //Checking is user existing in the database or not
        $query = "SELECT nombre_usuario,contraseña FROM `usuario` WHERE nombre_usuario='$nombreUsuario' and contraseña='".md5($contraseñaUsuario)."' ";
      	$result = mysqli_query($conexion,$query) or die(mysql_error());
      	$rows = mysqli_num_rows($result);
        if($rows==1){
      		$_SESSION['tipoUsuario'] = "admin";
      		header("Location: crud/Administrador/index.php"); // Redirect user to index.php
        }else{
      		echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='login_usuario.php'>Logearte</a></div>";
      	}
        }else{
        ?>
	    <div class="form">
	      <h1>Inicia Sesión</h1>
	      <form action="" method="post" name="login">
	        <input type="text" name="nombreUsuario" placeholder="Usuario" required />
	        <input type="password" name="contraseña" placeholder="Contraseña" required />
	        <input name="submit" type="submit" value="Entrar" />
	      </form>
	      <p>No estas registrado aún? <a href='registro_usuario.php'>Registrate Aquí</a></p>
	    </div>
    <?php } ?>
  </body>
</html>

