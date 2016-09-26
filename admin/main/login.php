<link rel="stylesheet" type="text/css" href="../css/estilofrm.css">
<?php
require("../../lib/database.php");
$sql = "SELECT * FROM usuarios";
$data = Database::getRows($sql, null);
if($data == null)
{
    header("location: register.php");
}

require("../lib/page2.php");
require("../../lib/validator.php");
Page::header("");

if(!empty($_POST))
{
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


					session_start();
			    	$_SESSION['id'] = $data['Id_Usuario'];
			      	$_SESSION['name'] = $data['Nombres']." ".$data['Apellidos'];
			      	$_SESSION['correo'] = $data['Email'];
			      	$_SESSION['foto'] = $data['Foto_Usuario'];



			      	$sql = "SELECT * FROM usuarios WHERE Id_Usuario = ?";
                	$id = $_SESSION['id'];
		    		$param = array($id);
		   			 $data = Database::getRow($sql, $param);
		    		if($data != null)
		    		{

		    			$consulta = "SELECT * FROM tipo_usuario WHERE Id_Tipo = ?";
                		$tipo = $data['Tipo_Usuario'];
		    			$parametro = array($tipo);
		    			$result = Database::getRow($consulta, $parametro);
		    			if($result != null)
		    			{
		    				

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
			      	
			      	header("location: index.php");
		    					
		    				
		    	
		    			}
		    			else
		    			{
		    				throw new Exception("No se recibieron datos del tipo.");
		    			}
		    	
		    }
		    else
		    {
		    	throw new Exception("No se recibió los datos del usuario.");
		    }

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

<div id="centro">
    <div id="con">
      <h4>Iniciar sesión</h4>
      <form  method='post'>
      <div class='row'>
		<div class='input-field col m12'>
			<i class='material-icons prefix'>person_pin</i>
			<input id='alias' type='text' name='alias' class='validate' required/>
	    	<label for='alias'>Usuario</label>
		</div>
		<div class='input-field col m12'>
			<i class='material-icons prefix'>vpn_key</i>
			<input id='clave' type='password' name='clave' class="validate" required/>
			<label for='clave'>Contraseña</label>
		</div>
	</div>
  <a id="derecha" href="cambiar_contra.php">¿Olvidaste tu email o contraseña?</a>
  <p id="izquierda2">
      <input type="checkbox" id="test5"/>
      <label for="test5">Recuérdame en este dispositivo.</label>
      <a  class="modal-trigger" href="#modal1"></a>
  </p>
     <button type='submit' class='btn blue'><i class='material-icons right'>verified_user</i>Ingresar</button>

</form>
    </div>
  </div>

<?php
Page::footer();
?>