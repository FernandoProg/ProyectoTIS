<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro Usuarios - Municipalidad</title>
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
      require('crud/conexion.php');
         // If form submitted, insert values into the database.
        if (isset($_REQUEST['nombreUsuario'])){
          $nombreUsuario = stripslashes($_REQUEST['nombreUsuario']); // removes backslashes
          $nombreUsuario = mysqli_real_escape_string($conexion,$nombreUsuario); //escapes special characters in a string

          $correoUsuario = $_REQUEST["correoUsuario"];

          $contraseñaUsuario = stripslashes($_REQUEST['contraseña']);
          $contraseñaUsuario = mysqli_real_escape_string($conexion,$contraseñaUsuario);
        
          $query = "INSERT into `usuario` (nombre_usuario, contraseña, rol, correo_usuario) VALUES ('$nombreUsuario', '".md5($contraseñaUsuario)."', 'usuario', '$correoUsuario')";
          $result = mysqli_query($conexion,$query);
      
          if($result){
            ?>
            <?php require("navbar_user.php"); ?>
            <div class="container">
              <div class="row">
                <div class="alert alert-success container mt-5 col-12" role="alert">
                    Te has <strong>registrado correctamente!</strong>. Presiona <a href="acceso_usuarios.php" class="text-green">aquí</a> para iniciar sesión.
                </div>
                <div class="col-12 text-center mt-5 ">
                  <span class="fs-1 fw-bolder" >REGÍSTRATE</span>
                  <br>
                  <span> Es rápido y fácil. </span>
                </div>
                <div class="col-12">
                  <form class="form mt-5" >
                      <div class="mb-3 row">
                          <div class="col-lg-6 col-sm-12 col-md-12">
                            <label for="exampleInputEmail1" class="fw-bolder form-label">Nombre de Usuario</label>
                            <input type="text" required class="form-control" id="exampleInputEmail1" placeholder="JuanPerez1 , felipeBurgos14 , JuanFarias , etc..." name="nombreUsuario" maxlength="50" required>
                            <div id="UsernameHelp" class="form-text">Recuerda que no podrás cambiar tu nombre usuario posteriormente.</div>
                          </div>
                          <div class="col-lg-6 col-sm-12 col-md-12">
                            <label for="exampleInputEmail1" class="fw-bolder form-label">Email</label>
                            <input type="email" required class="form-control" id="exampleInputEmail1" placeholder="name@xample.com" name="correoUsuario" maxlength="50" required>
                            <div id="emailHelp" class="form-text"></div>
                          </div>
                      </div>  
                      <div class="mb-3 col-lg-4 col-sm-12 ">
                          <label for="exampleInputPassword1" class="fw-bolder form-label">Contraseña</label>
                          <input type="password" required class="form-control" id="exampleInputPassword1" name="contraseña" minlength="6" maxlength="16" placeholder="28dejulio , trececatorce , etc..." required>
                      </div>
                      <button type="submit" class="btn btn-primary">Registarte</button>
                      <a href="index.php" class="btn btn-secondary" >Volver atrás</a>
                  </form>
                </div>
              </div>
            </div>
            
            <?php
          }
        }else{
      ?>
        <?php require("navbar_user.php"); ?>
        <div class="container">
          <div class="row">

            <div class="col-12 text-center mt-5 ">
              <span class="fs-1 fw-bolder" >REGISTRATE</span>
              <br>
              <span> Es rápido y fácil. </span>
            </div>
            <div class="col-12">
              <form class="form mt-5" >
                  <div class="mb-3 row">
                      <div class="col-lg-6 col-sm-12 col-md-12">
                        <label for="exampleInputEmail1" class="fw-bolder form-label">Nombre de Usuario</label>
                        <input type="text" required class="form-control" id="exampleInputEmail1" placeholder="JuanPerez1 , felipeBurgos14 , JuanFarias , etc..." name="nombreUsuario" maxlength="50" required>
                        <div id="UsernameHelp" class="form-text">Recuerda que no podrás cambiar tu nombre usuario posteriormente.</div>
                      </div>
                      <div class="col-lg-6 col-sm-12 col-md-12">
                        <label for="exampleInputEmail1" class="fw-bolder form-label">Email</label>
                        <input type="email" required class="form-control" id="exampleInputEmail1" placeholder="name@xample.com" name="correoUsuario" maxlength="50" required>
                        <div id="emailHelp" class="form-text"></div>
                      </div>
                  </div>  
                  <div class="mb-3 col-lg-4 col-sm-12 ">
                      <label for="exampleInputPassword1" class="fw-bolder form-label">Contraseña</label>
                      <input type="password" required class="form-control" id="exampleInputPassword1" name="contraseña" minlength="6" maxlength="16" placeholder="28dejulio , trececatorce , etc..." required>
                  </div>
                  <button type="submit" class="btn btn-primary">Registrarte</button>
                  <a href="index.php" class="btn btn-secondary" >Volver atrás</a>
              </form>
            </div>
          </div>
        </div>
      <?php } require("footer.php"); ?>
  </body>
</html>