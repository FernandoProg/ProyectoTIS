<?php
session_start();
if(!isset($_SESSION["tipoUsuario"])){
header("Location: login_usuario.php");
exit(); }
?>
