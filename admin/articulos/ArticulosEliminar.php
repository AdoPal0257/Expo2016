<?php
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Eliminar Articulo");

if(!empty($_GET['id'])) 
{
    $id = $_GET['id'];
}
else
{
    header("location: articulosindex.php");
}

if(!empty($_POST))
{
	$id = $_POST['id'];
	try 
	{	
			$sql = "DELETE FROM articulos WHERE Id_Articulo = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
		    header("location: articulosindex.php");
	} 
	catch (Exception $error) 
	{
		print("<div class='card-panel red'><i class='material-icons left'>error</i>".$error->getMessage()."</div>");
	}
}
?>
<form method='post' class='row'>
	<input type='hidden' name='id' value='<?php print($id); ?>'/>
	<button type='submit' class='btn red'><i class='material-icons right'>done</i>Si</button>
	<a href='articulosindex.php' class='btn grey'><i class='material-icons right'>cancel</i>No</a>
</form>
<?php
Page::footer();
?>