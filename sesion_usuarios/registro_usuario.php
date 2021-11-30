<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro Usuario - Municipalidad</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

  </head>
  <body >
    <?php
      require('../crud/conexion.php');
         // If form submitted, insert values into the database.
         if (isset($_REQUEST['nombreUsuario'])){
      	$nombreUsuario = stripslashes($_REQUEST['nombreUsuario']); // removes backslashes
      	$nombreUsuario = mysqli_real_escape_string($conexion,$nombreUsuario); //escapes special characters in a string
        
      	$contraseñaUsuario = stripslashes($_REQUEST['contraseña']);
      	$contraseñaUsuario = mysqli_real_escape_string($conexion,$contraseñaUsuario);
      
        $query = "INSERT into `usuario` (nombre_usuario, contraseña, rol) VALUES ('$nombreUsuario', '".md5($contraseñaUsuario)."', 'usuario')";
        $result = mysqli_query($conexion,$query);
		
        if($result){
         ?>
         <div class="alert alert-success container mt-5" role="alert">
            Te has <strong>registrado correctamente!</strong>. Presiona <a href="login_usuario.php" class="text-green">aquí</a> para iniciar sesión.
         </div>

         <form class="form container mt-5">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
              <input type="text" disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombreUsuario">
              <div id="UsernameHelp" class="form-text">Recuerda que no podrás cambiar tu nombre usuario posteriormente.</div>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" disabled class="form-control" id="exampleInputPassword1" name="contraseña">
          </div>
          <a href="login_usuario.php" class="btn btn-primary">Ir al inicio de sesión</a>
        </form>
         
         <?php
            
        }
        }else{
      ?>
      <form class="form container mt-5">
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
              <input type="text" required class="form-control" id="exampleInputEmail1" placeholder="JuanPerez1 , felipeBurgos14 , JuanFarias , etc..." name="nombreUsuario" maxlength="50">
              <div id="UsernameHelp" class="form-text">Recuerda que no podrás cambiar tu nombre usuario posteriormente.</div>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" required class="form-control" id="exampleInputPassword1" name="contraseña" minlength="6" maxlength="16" placeholder="28dejulio , trececatorce , etc...">
          </div>
          <button type="submit" class="btn btn-primary">Registrarme</button>
          <a href="login_usuario.php" class="btn btn-secondary" >Volver atrás</a>
    </form>
    <?php } require("../footer.php"); ?>
  </body>
</html>