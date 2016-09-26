<?php
require("../../lib/database.php");
$sql = "SELECT * FROM usuarios";
$data = Database::getRows($sql, null);


$sql = "SELECT Username,Email FROM usuarios";
?>
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
           			 <form class='row' method='post' action="correo.php">
	<div class='row'>
		<div class='input-field col m6 offset-m3 s12'>
			<i class='material-icons prefix'>person_pin</i>
			<input id='alias' type='text' name='alias' class='validate' required/>
	    	<label for='alias'>Usuario</label>
		</div>
		<div class='input-field col m6 offset-m3 s12'>
			<i class='material-icons prefix'>email</i>
			<input id='correo' type='text' name='correo' class="validate" required/>
			<label for='correo'>Correo</label>
		</div>
	</div>
	<button type='submit' class='btn blue'name= "enviar" value="Enviar" id="ubica"><i class='material-icons right'>verified_user</i>Enviar</button>
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
