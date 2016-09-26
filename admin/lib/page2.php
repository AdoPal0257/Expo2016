<?php
session_start();
if(!isset($_SESSION['contador2'])){$_SESSION['contador2'] = 0;}
class Page
{
	public static function header($title)
	{
		ini_set("date.timezone","America/El_Salvador");
		$sesion = false;
		$filename = basename($_SERVER['PHP_SELF']);
		$header = "<!DOCTYPE html>
					<html lang='es'>
					<head>
						<meta charset='utf-8'>
						<title>Administración | Galaxy Bowling - $title</title>
						<script src='http://code.jquery.com/jquery-latest.js'></script>
    
						
						<link type='text/css' rel='stylesheet' href='styles.css'/>
            			<link type='text/css' rel='stylesheet' href='../../css/materialize.min.css'/>
            			<link type='text/css' rel='stylesheet' href='../../css/icons.css'/>
            			
      					<!--Let browser know website is optimized for mobile-->
    					<meta name='viewport' content='width=device-width, initial-scale=1.0'/>		

					</head>
					<body>
					";

		      	if(isset($_SESSION['name']))
    			{
    				
    				$sesion = true;
	        		$header .= "";

                $header .= "";
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
	}

	public static function footer()
	{
		$footer = "</div>
     					<script type='text/javascript' src='../js/codigo.js'></script>
  						<script type='text/javascript' src='../js/materialize.js'></script>
					    <script src='../../js/jquery-2.2.3.min.js'></script>
	    			    <script src='../../js/materialize.min.js'></script>
	    			    <script>
	    					//$('.datepicker').pickadate({ selectMonths: true,selectYears: 15 });
                  			$(document).ready(function() { $('select').material_select(); });
                  			 $(document).ready(function(){
                             $('.collapsible').collapsible({accordion : true});});
							$(document).ready(function() { $('.button-collapse').sideNav(); $('.button-collapse').sideNav(''); });
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