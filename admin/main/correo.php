<?php
require("../../lib/database.php");
function generateRandomString($length = 10)
 {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) 
    	{ 
    		$randomString .= $characters[rand(0, $charactersLength - 1)]; 
    	}
    	 return $randomString; 
} 

if(isset($_POST['correo']))
 {
$coreo= $_POST['correo'];
$usu= $_POST['alias'];
 $sql = "SELECT * FROM usuarios WHERE Username=? and Email=?";
$param = array($usu,$coreo);
$data = Database::getRow($sql, $param);
if ($data != null )
{

$email_to = $_POST['correo'];
$email_subject = "Expo Ricaldone 2016";
$contra = generateRandomString();

if(!isset($_POST['alias'])  ||!isset($_POST['correo'])) 
{
echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}
$email_message = "Hola, " . $_POST['alias'] . "<br>";
$email_message.= "Su codigo de verificacion es : ". $contra."<br>";
$email_message .= "E-mail: " . $_POST['correo'] . "<br>";


$headers = 'From: '.$email_to."\r\n".
'Reply-To: '.$_POST['correo']."\r\n" .
'X-Mailer: PHP/' . phpversion();


require "../lib/phpmailer/PHPMailerAutoload.php";

$mail = new PHPMailer;
$mail->SMTPOptions = array(
'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
));
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'Galaxybowling.ExpoRicaldone16@gmail.com';                 // SMTP username
$mail->Password = 'ExpoRicaldone16';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('Galaxybowling.ExpoRicaldone16@gmail.com', 'Galaxy Bowling');
$mail->addAddress($email_to);     // Add a recipient             // Name is optional
$mail->addReplyTo('Galaxybowling.ExpoRicaldone16@gmail.com', 'Information');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =$email_subject ;
$mail->Body    = $email_message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else
 {

$name = $_POST['alias'];

$sql = "SELECT * FROM usuarios";
$data = Database::getRows($sql, null);
if($data != null)
{
    header("location: cambiar_contra.php");
}

try 
{
if(!isset($_POST['alias']) )
{
echo "<script> alert('Por favor, vuelva atrás y verifique la información ingresada') </script>";
}
else 
{
   $clave = password_hash($contra, PASSWORD_DEFAULT);
                    $sql = "UPDATE usuarios set Confirmacion=? where Username=?";
                    $param = array($clave, $name);
                    Database::executeRow($sql, $param);
                      

	session_start();
		$_SESSION['usuario'] = $_POST['alias'];
                      header("location: cambio.php");

}
} 
catch (Exception $e) 
{
echo "<script>alert('A ocurrido un error repentino')</script>";
}




}
}
else 
{
	echo '<script> alert("A ocurrido un error repentino")</script>';
header("location: cambiar_contra.php");
}

}

?>