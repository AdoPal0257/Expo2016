<?php
 
require_once("phpmailer/class.phpmailer.php");
require("phpmailer/class.phpmailer.php");
require("phpmailer/class.phpmailer.php");	
 
$correo = new PHPMailer();
 
$correo->IsSMTP();
 
$correo->SMTPAuth = true;
 
$correo->SMTPSecure = 'tls';
 
$correo->Host = "smtp.gmail.com";
 
$correo->Port = 587;
 
$correo->Username   = "luigichevez@gmail.com";
 
$correo->Password   = "cindy654";
 
$correo->SetFrom("luigichevez@gmail.com", "Mi Codigo PHP");
 
$correo->AddReplyTo("luigichevez@gmail.com","Mi Codigo PHP");
 
$correo->AddAddress("barselona.luis@hotmail.com", "Jorge");
 
$correo->Subject = "Mi primero correo con PHPMailer";
 
$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");
 
$correo->AddAttachment("images/phpmailer.gif");
 
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo "Mensaje enviado con exito.";
}
 
?>