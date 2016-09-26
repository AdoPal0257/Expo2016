
<!DOCTYPE html>
					<html lang='es'>
					<head>
						<meta charset='utf-8'>
						<title>Administración | Galaxy Bowling - $title</title>
						
						<link type='text/css' rel='stylesheet' href='styles.css'/>
						<link type='text/css' rel='stylesheet' href='../css/estilo.css'/>
            			<link type='text/css' rel='stylesheet' href='../../css/materialize.min.css'/>
            			<link type='text/css' rel='stylesheet' href='../../css/icons.css'/>

      					<!--Let browser know website is optimized for mobile-->
    					<meta name='viewport' content='width=device-width, initial-scale=1.0'/>		

					</head>
					<body>
					<header>
           			 <form class='row' method='post' action="verificar.php" >
	<div class='row'>
		<div class='input-field col m6 offset-m3 s12'>
			<i class='material-icons prefix'>person_pin</i>
			<input id='codigo' type='text' name='codigo' class='validate' required/>
	    	<label for='codigo'>Codigo de confirmacion</label>
		</div>
		<div class='input-field col m6 offset-m3 s12'>
			<i class='material-icons prefix'>vpn_key</i>
			<input id='contra' type='password' name='contra' class="validate" required/>
			<label for='contra'>Contraseña</label>
		</div>
		<div class='input-field col m6 offset-m3 s12'>
			<i class='material-icons prefix'>vpn_key</i>
			<input id='contra2' type='password' name='contra2' class="validate" required/>
			<label for='contra2'>Confirmacion de contraseña</label>
		</div>
	</div>
	<button type='submit' class='btn blue 'name= "enviar" value="Enviar" id="ubica"><i class='material-icons right'>verified_user</i>Cambiar</button>
	<?php
session_start();
$alias = $_SESSION['usuario'];
$_SESSION['usuario2']=$alias;
if (isset($_SESSION['mensaje2']))
{
echo $_SESSION['mensaje2'] ;	
}
if (isset($_SESSION['mensaje']))
{
echo $_SESSION['mensaje'] ;	
}
$_SESSION['mensaje2']=null;
$_SESSION['mensaje']=null;
	?>
</form>		
   				</header>
					    <script src='../../js/jquery-2.2.3.min.js'></script>
	    			    <script src='../../js/materialize.min.js'></script>
	    			    <script>
	    					//$('.datepicker').pickadate({ selectMonths: true,selectYears: 15 });
                  			$(document).ready(function() { $('select').material_select(); });
							$(document).ready(function() { $('.button-collapse').sideNav(); $('.button-collapse').sideNav(''); });
    				    </script>
					</body>
				</html>