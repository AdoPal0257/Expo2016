<?php

require("../../lib/database.php");

$codigo_verificacion = $_POST['codigo'];
$clave = $_POST['contra'];
$clave2 = $_POST['contra2'];
session_start();
$alias = $_SESSION['usuario2'];
 $sql = "SELECT * FROM usuarios WHERE Username=?";
$param = array($alias);
$data = Database::getRow($sql, $param);
if ($codigo_verificacion != "" &&$clave != "" && $clave2 != "")
	{

	if ($clave == $clave2)
	{
try
 {       
    if ($data != NULL)
		    {
                   $hash= $data['Confirmacion'];

         
                    if (password_verify($codigo_verificacion, $hash))
                   {
                   	 $clave = password_hash($clave, PASSWORD_DEFAULT);
                    $sql = "UPDATE usuarios set Clave=? where Username=?";
                    $param = array($clave, $alias);
                    Database::executeRow($sql, $param);
                     $sql = "UPDATE usuarios set Confirmacion=? where Username=?";
                    $param = array("", $alias);
                    Database::executeRow($sql, $param);
                      header("location: login.php"); 
		    		}
		    		else 
		    		{
		    		
            session_start();
            $_SESSION['mensaje'] = '<script> alert("El codigo de confirmacion no coincide ")</script>';
                header("location: cambio.php"); 
		    		}
		    			    }
		    else 
		    {
    
            session_start();
            $_SESSION['mensaje2'] = '<script> alert("A ocurrido un error repentino la data ")</script>';
             header("location: cambio.php");

		    }
      }
      catch (Exception $e) 
{
echo '<script> alert("A ocurrido un error repentino")</script>';
}
}
else 
{
            $_SESSION['mensaje2'] = '<script> alert("La claves no coinciden ")</script>';
             header("location: cambio.php");
}
}

else 
{
 throw new Exception("Debe ingresar todos los datos de autenticación.");
}
 
?>