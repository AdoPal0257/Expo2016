<?php
require("../../lib/database.php");
$sql = "SELECT * FROM usuarios where Tipo_Usuario = 2";
$data = Database::getRows($sql, null);

require("../../lib/validator.php");


if(!empty($_POST))
{

	$conexion = mysqli_connect("localhost","admin","admin","galaxydb");
	mysqli_set_charset($conexion, "utf8");

	$_POST = validator::validateForm($_POST);
  	$alias = $_POST['alias'];
  	$clave = $_POST['clave'];
  	try
    {
      	if($alias != "" && $clave != "")
  		{
  			$sql = "SELECT * FROM usuarios WHERE Username = ?";
		    $param = array($alias);
		    $data = Database::getRow($sql, $param);
		    if($data != null)
		    {
		    	$hash = $data['Clave'];
		    	if(password_verify($clave, $hash)) 
		    	{
			    	
			    	$_SESSION['id'] = $data['Id_Usuario'];
			      	$_SESSION['name'] = $data['Nombres']." ".$data['Apellidos'];
			      	$_SESSION['correo'] = $data['Email'];
			      
			     
			  
			      	$usuario = $_SESSION['id'];
			      	$fecha = date('U');
			      	$estado = 0;
			      	
			      	$peticion = "INSERT INTO pedidos (Id_Cliente, Fecha, Estado) Values (?,?,?)";

			      	$params = array($usuario, $fecha,$estado);

			      	Database::executeRow($peticion, $params);

			      	$consulta = "Select * from pedidos where Id_Cliente = '".$usuario."' order by Fecha desc LIMIT 1";

			      	$par = array($usuario);

			      	$result = Database::getRow($consulta, $par);

			      	$_SESSION['id_pedido'] = $result['Id_Pedido'];

			      

			      	$id_pedido = $_SESSION['id_pedido'];
			      	
			      	$paquete = null;
			      	$cantidad = 1;

			      	for ($i=0;$i < $_SESSION['contador']; $i++) 
			      	{ 
			      		$producto = $_SESSION['producto'][$i];
	
						$consulta = "INSERT INTO linea_pedidos (Id_Pedido, Id_producto, Id_paquete, Cantidad) values (?,?,?,?)";

						$params = array($id_pedido, $producto,$paquete,$cantidad);

			      		Database::executeRow($consulta, $params);


			      		$sql = "SELECT * FROM articulos where Id_Articulo = '".$producto."'";

			      		$resultado = mysqli_query($conexion, $sql);

						while ($fila = mysqli_fetch_array($resultado)) {
							$existencia = $fila['Stock'];
							$nuevacant = $existencia - 1;

							$act = "UPDATE articulos set Stock = '".$nuevacant."' WHERE Id_Articulo = '".$producto."'";

							$final = mysqli_query($conexion,$act);
						}

	
					}
					header("location: destruir.php");
					

				}
				else 
				{
					throw new Exception("La clave ingresada es incorrecta.");
				}
		    }
		    else
		    {
		    	throw new Exception("El alias ingresado no existe.");
		    }
	  	}
	  	else
	  	{
	    	throw new Exception("Debe ingresar un alias y una clave.");
	  	}
    }
    catch (Exception $error)
    {
        print("<div class='card-panel red'><i class='material-icons left'>error</i>".$error->getMessage()."</div>");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
	<meta charset='utf-8'>
  	<link rel='stylesheet' href='../css/estilo.css'>
  	<link href='../css/fonts.css' rel='stylesheet'>
  	<link href='../../css/icons.css' rel='stylesheet'>
  	<link type='text/css' rel='stylesheet' href='../css/materialize.min.css'  media='screen,projection'/>
  	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
  	<script src='http://code.jquery.com/jquery-latest.js'></script>
  	<script type='text/javascript' src='../js/jquery.js'></script>
  	<script type='text/javascript' src='../js/materialize.min.js'></script>
  	<script type='text/javascript' src='../js/codigo.js'></script>
  	<script type='text/javascript' src='../js/materialize.js'></script>
</head>
<body id="log-cliente">

<div class="row">
	<div class="container">
    <div id="seccion-login" class="col l5 s12 m12">

    	<div class="section">
    		<h4 class="center">¡Bienvenido!</h4>
      		<h5 class="center">Inicie sesión para disfrutar de más opciones.</h5>
  		</div>

     
      <div class="divider"></div>

      	<form  method='post'>
 
				<div id="alias" class='input-field col s12 m12 l12'>
					<i class='material-icons prefix'>person_pin</i>
					<input id='alias' type='text' name='alias' class='validate' autocomplete="off" required/>
	    			<label for='alias'>Usuario</label>
				</div>
		

			
			<div id="clave" class='input-field col s12 m12 l12'>
				<i class='material-icons prefix'>vpn_key</i>
				<input id='clave' type='password' name='clave' class="validate" autocomplete="off" required/>
				<label for='clave'>Contraseña</label>
			</div>



			
  			<div class="col s12 m12 l6 center">
  				<a id="derecha" href="register.php">¿Aún no tienes una cuenta?</a>
  			</div>
  			<div class="col s12 m12 l6 center">
  				<a id="derecha" href="cambiar_contra.php">¿Olvidaste tu email o contraseña?</a>
  			</div>

  			<div class="col s12 m12 l12 center">
  				<button id="enviar" type='submit' class='btn blue'><i class='material-icons right'>verified_user</i>Ingresar</button>
  			</div>
     		
     		
		</form>

			<div id="admin" class="col s12 m12 l12 center">
  				<a href="../../admin/main/login.php">Ingresar como administrador</a>
  			</div>
  			<div id="inicio" class="col s12 m12 l12 center">
  				<a href="index.php">Regresar al inicio</a>
  			</div>

	</div>
	</div>
</div>
  
</body>
</html>
