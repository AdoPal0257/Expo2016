<?php
session_start();
class Page
{
	public static function header($title)
	{
		$sql = "SELECT * FROM usuarios WHERE Id_Usuario = ?";
                	$id = $_SESSION['id'];
		    		$param = array($id);
		   			 $data = Database::getRow($sql, $param);
		    $consulta = "SELECT * FROM tipo_usuario WHERE Id_Tipo = ?";
                		$tipo = $data['Tipo_Usuario'];
		    			$parametro = array($tipo);
		    			$result = Database::getRow($consulta, $parametro);
		    			$_SESSION['usuario'] = $result['usuario'];
			      	$_SESSION['tipouser'] = $result['tipo_usuario'];
			      	$_SESSION['articulo'] = $result['articulo'];
			      	$_SESSION['tipopro'] = $result['tipo_producto'];
			      	$_SESSION['imgpro'] = $result['img_producto'];
			      	$_SESSION['paquetes'] = $result['paquetes'];
			      	$_SESSION['pedidos'] = $result['pedidos'];
			      	$_SESSION['multimedia'] = $result['multimedia'];
			      	$_SESSION['tipomulti'] = $result['tipo_multimedia'];
			      	$_SESSION['tipoimg'] = $result['tipo_img'];
			      	$_SESSION['guardar'] = $result['guardar'];
			      	$_SESSION['modificar'] = $result['modificar'];
			      	$_SESSION['eliminar'] = $result['eliminar'];
		ini_set("date.timezone","America/El_Salvador");
		$sesion = false;
		$filename = basename($_SERVER['PHP_SELF']);
		$header = "<!DOCTYPE html>
					<html>

					<head>
					    <title>Materialize CSS Tutorial</title>
					    <style>
					    #content {
					        clear: both;
					        background: #ffffff;
					        padding: 0;
					        width: 100%;
					        height: 580px;
					        border: 0;
					    }
					</style>
					    <meta charset='UTF-8'>
					    <!-- Le decimos al navegador que nuestra web esta optimizada para moviles -->
					    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

					    <!-- Cargamos el CSS -->
					    <link type='text/css' rel='stylesheet' href='../../css/materialize.min.css' media='screen,projection' />
					    <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>  
					    <link type='text/css' rel='stylesheet' href='../css/custom.css' />
						</head>
						 <script>$('.dropdown-button').dropdown({hover: true});</script>
					<body>";

		      	if(isset($_SESSION['name']))
    			{
    				
    				$sesion = true;
	        		$header .= "
        <nav class='top-nav '>
            <div class='nav-wrapper teal accent-4'>
                <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='mdi-navigation-menu'></i></a>
                <ul class='side-nav fixed grey darken-4' id='mobile-demo'>
                <li class='no-padding'>
                 <a href='#!user'><img class='background' Style='margin-left:-16px;' src='../img/wall.jpg'></a>
                 <a class='dropdown-button' href='#' data-activates='dropdown-mobile'><span class='white-text name'>$_SESSION[name]</span>
                    </a>
                      <a href='#!email'><span class='white-text email'>$_SESSION[correo]</span></a>
                </li>
                <li><a id='inde' class='waves-effect'>Inicio</a></li>";

                if ($_SESSION['usuario'] != null) {$header .= "<li><a id='u' class='waves-effect'>Usuarios</a></li>";}
                if ($_SESSION['tipouser'] != null) {$header .= "<li><a id='tipou' class='waves-effect'>Tipo Usuario</a></li>";}
                if ($_SESSION['articulo'] != null) {$header .= "<li><a id='articulos' class='waves-effect'>Articulos</a></li>";}
                if ($_SESSION['tipopro'] != null) {$header .= "<li><a id='tipoproducto' class='waves-effect'>Tipo articulos</a></li>";}
                if ($_SESSION['imgpro'] != null) {$header .= "<li><a id='imaporducto' class='waves-effect'>Imagenes productos</a></li>";}
                if ($_SESSION['paquetes'] != null) {$header .= "<li><a id='paquetes' class='waves-effect'>Paquetes</a></li>";}
                if ($_SESSION['pedidos'] != null) {$header .= "<li><a id='pedidos' class='waves-effect'>Pedidos</a></li>";}
                if ($_SESSION['multimedia'] != null) {$header .= "<li><a id='multimedia'class='waves-effect'>Multimedia</a></li>";}
                if ($_SESSION['tipomulti'] != null) {$header .= "<li><a id='tipomulti'class='waves-effect'>Tipo Multimedia</a></li>";}
                if ($_SESSION['tipoimg'] != null) {$header .= "<li><a id='tipoimg' class='waves-effect'>Tipo Imagen</a></li>";}



                $header .= "

						</ul>
			            </div>
			        </nav>	        
			    <main>
			    <ul id='dropdown-mobile' class='dropdown-content grey darken-3'>
               <li><a href='#!'></a></li>
                <li><a href='../users/profile.php'>Editar perfil</a></li>
                <li><a href='../main/logout.php'>Salir</a></li>
            </ul>
           <iframe id='content' src='http://google.com' class='portfolio'>
          iFrames not supported
        </iframe>";
	      		}
	      		else
	      		{
	      			$header .= "<a href='../../' class='brand-logo'>
	        						<i class='material-icons'>web</i>
	    						</a>";
	      		}
		      	$header .= "
		    			
	  				<div class='container center-align'>";
	  	print($header);
  		if($sesion)
  		{
  			if($filename != "login.php")
  			{
  				print("<h3>$title</h3>");
  			}
  			else
  			{
  				header("location: index.php");
  			}
  		}
  		else
  		{
  			if($filename != "login.php" && $filename != "register.php")
  			{
  				print("<div class='card-panel red'><a href='../main/login.php'><h5>Debe iniciar sesión.</h5></a></div>");
		  		self::footer();
		  		exit();
  			}
  			else
  			{
  				print("<h3>$title</h3>");
  			}
  		}

  		//Correo de felicitacion
  		$sql = "SELECT Id_Usuario,Nombres ,Apellidos,Fecha_nacimiento,Email,Felicitacion FROM usuarios";
  			$params = null;
     $data = Database::getRows($sql, $params);

		   			 if ($data != null)
		   			 {
		   			 	
                              

									require "phpmailer/PHPMailerAutoload.php";

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
									   // Add a recipient             // Name is optional
										$mail->addReplyTo('Galaxybowling.ExpoRicaldone16@gmail.com', 'Information');
										       // Add attachments
										$mail->addAttachment('c:/xampp/htdocs/galaxyfunplaza/admin/lib/prueba.jpg', 'cumpleaños.jpg');   // Optional name
										$mail->isHTML(true);                                  // Set email format to HTML

										
										$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		   			 	foreach ($data as $row) 
		   			 		{
		   			 	    $correo2=$row['Email'];
		   			 	    $usuarios2=$row['Nombres'];
		   			 	     $usuarios3=$row['Apellidos'];
		   			 		$fecha2= $row['Fecha_nacimiento'];
		   			 		$dato = explode("-", $fecha2); 
		   			 		$fecha_actual=date('m');
		   			 		$fecha_actual2=date('d');		
		   			 		$fecha_actual3=date('Y');
		   			 	$fe=0;
  						$hoy = date( 'y-m-d' );
		   			$ayer = date( "y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );  
		   			$dos= explode("-", $ayer);
		   			
		         if ($dato[1] == $dos[1] && $dato[2] == $dos[2])
		         {
     			                $resp=0;
		   			 			$idusu=$row['Id_Usuario'];
		   			 			$sql = "UPDATE usuarios set Felicitacion=? where Id_Usuario=?";
                                $param = array($resp, $idusu);
		   			             Database::executeRow($sql, $param);
     			}
     			
		   			 		if ($fecha_actual == $dato[1] && $fecha_actual2 == $dato[2] && $row['Felicitacion'] == 0 )
		   			 		{
		   			 			$fecha_eda=($fecha_actual3)-($dato[0]);
                               
                      	  $email_to = $correo2;
		   			$email_subject = "Expo Ricaldone 2016";
		   			 if($usuarios2== null && $correo2 == null) 
									{
									echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
									echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
									die();
									}
									$email_message = "Hola,".$usuarios2." ".$usuarios3."<br>";
									$email_message.= "Feliz cumpleaños ".$fecha_eda.", de parte de la gran familia Galaxy Bowling ";
									$headers = 'From: '.$email_to."\r\n".
									'Reply-To: '.$row['Email']."\r\n" .
									'X-Mailer: PHP/' . phpversion();
                                     $mail->addAddress($email_to);  
                                     $mail->Subject =$email_subject ;
										$mail->Body    = $email_message;

										if(!$mail->send()) {
										    echo 'Mensaje no enviado.';
										    echo 'Mailer Error: ' . $mail->ErrorInfo;
										}
										else 
										{
											$resp=1;
		   			 			$idusu=$row['Id_Usuario'];
		   			 			$sql = "UPDATE usuarios set Felicitacion=? where Id_Usuario=?";
                                $param = array($resp, $idusu);
		   			             Database::executeRow($sql, $param);
										}
										$mail->ClearAddresses();

		   			 		}
		   			 	
		   			 		}

	}


	}

	public static function footer()
	{
		$footer = "</div>
					     <script type='text/javascript' src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
   						 <script type='text/javascript' src='../../js/materialize.min.js'></script>

	    			    <script>
	    					//$('.datepicker').pickadate({ selectMonths: true,selectYears: 15 });
                  			$(document).ready(function() { $('select').material_select(); });
                  			$(document).ready(function() { $('.collapsible').collapsible();});
							$(document).ready(function() { $('.button-collapse').sideNav({menuWidth: 265});});
							  $('#content').attr('src', '../main/index2.php');
							 $(document).ready(function () {
					            $('#u').on('click', function(){
					            $('#content').attr('src', '../users/index.php');
					       		});
					       		$('#tipou').on('click', function(){
					            $('#content').attr('src', '../tusers/index.php');
					       		});
					       		$('#articulos').on('click', function(){
					            $('#content').attr('src', '../articulos/articulosindex.php');
					       		});
					       		$('#tipoproducto').on('click', function(){
					            $('#content').attr('src', '../tpro/index.php');
					       		});
					       		$('#imaporducto').on('click', function(){
					            $('#content').attr('src', '../ipro/index.php');
					       		});
					       		$('#paquetes').on('click', function(){
					            $('#content').attr('src', '../paquetes/index.php');
					       		});
					       		$('#pedidos').on('click', function(){
					            $('#content').attr('src', '../store/index.php');
					       		});
					            $('#multimedia').on('click', function(){
					            $('#content').attr('src', '../multimedia/index.php');
					       		});
					       		$('#tipomulti').on('click', function(){
					            $('#content').attr('src', '../tmul/index.php');
					       		});
					       		$('#tipoimg').on('click', function(){
					            $('#content').attr('src', '../tima/index.php');
					       		});
					       		$('#inde').on('click', function(){
					            $('#content').attr('src', '../main/index2.php');
					       		});
					        });
    				    </script>
					</body>
				</html>";

		print($footer);
	}

	public static function setCombo($name, $value, $query)
	{
		$data = Database::getRows($query, null);
		$combo = "<select name='$name'>";
		if($value == null)
		{
			$combo .= "<option value='' disabled selected>Seleccione una opción</option>";
		}
		foreach($data as $row)
		{
			$combo .= "<option value='$row[0]'";
			if(isset($_POST[$name]) == $row[0] || $value == $row[0])
			{
				$combo .= " selected";
			}
			$combo .= ">$row[1]</option>";
		}	
		$combo .= "</select>
				<label style='text-transform: capitalize;'>$name</label>";
		print($combo);
	}
}
?>