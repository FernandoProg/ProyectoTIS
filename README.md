# Los datos para realizar la conexión con la base de datos son los siguientes:

###### <?php 
###### $conexion = mysqli_connect("localhost", "root","","proyecto_municipalidad"); 
###### ?>

# Esto significa cada uno de los campos : mysqli_connect("dirección ip", "mi_usuario", "mi_contraseña", "mi_bd")
#--------------------------------------------------------------------------------------------------------------------#

# Los datos del admin para hacer ingreso a la página son : 

Nombre de usuario : lsparedes <br>
Contraseña : lsparedes

#--------------------------------------------------------------------------------------------------------------------#

# Las carpetas del proyecto deben estar alojadas dentro de xampp/htdocs/proyecto-municipalidad

# La base de datos se encuentra comprimida en proyecto_municipalidad.rar , para subirla a phpmyadmin se deberá 
# descomprimir y cambiar los siguientes valores al XAMPP:
xampp > Apache > Config > PHP (php.ini) > post_max_size=40M // Cambiar a 100M <br>
xampp > Apache > Config > PHP (php.ini) > upload_max_filesize=40M // Cambiar a 100M
# Se recomienda después de hacer estos cambios, volverlos a sus valores por defecto.
