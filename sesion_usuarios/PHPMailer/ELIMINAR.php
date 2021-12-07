<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('src/PHPMailer.php');
require('src/Exception.php');
require('src/SMTP.php');



$objetoMail = new PHPMailer();

$objetoMail->isSMTP();
$objetoMail->Host = 'smtp.mailtrap.io';
$objetoMail->Username = '0e0575b7a8ae09';
$objetoMail->Password = '7cdcaee7d0820e';

$objetoMail->SMTPAuth = true;
$objetoMail->SMTPSecure = 'tls';
$objetoMail->Port = '2525';

/**PRUEBAS CORREO */

$objetoMail->From = 'correofalso@prueba.com'; //Remitente
$objetoMail->addAddress('fernando8tavob@gmail.com'); //Destinatario
$objetoMail->Subject = 'probando correito con php!'; //Destinatario
$objetoMail->Body = 'Este es el body de mi correito con php!!!'; //Destinatario


if ($objetoMail->send() == false) {
    echo "No se pudo enviar el email...";
    echo $objetoMail->ErrorInfo;
} else {
    echo "Mensaje enviado correctamente";
}
