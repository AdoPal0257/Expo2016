<?php
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Eliminar usuario");

try 
{
		if(!empty($_GET['id'])) 
		{
    		$id = $_GET['id'];
    		$sql = "UPDATE pedidos set Estado = ? where Id_Pedido = ?";
    		$estado = 2;
		    $params = array($estado, $id);
		    Database::executeRow($sql, $params);
		    header("location: index.php");
		}else{
    		header("location: index.php");
			}
}catch (Exception $error) 
	{
		print("<div class='card-panel red'><i class='material-icons left'>error</i>".$error->getMessage()."</div>");
	}

?>

<?php
Page::footer();
?>