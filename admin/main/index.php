<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<?php
require("../lib/page.php");
require("../../lib/database.php");

    
	page::header("");
  	$sql = "SELECT * FROM usuarios WHERE Id_Usuario = ?";
    $valor = $_SESSION['id'];
  	$params = array($valor);
    $data = Database::getRow($sql, $params);


    /*if($data != null)
    {
    	foreach ($data as $row) {
    		$escritorio = "
						   <img class='col s12' id='full' src='data:image/*;base64,$data[Wallpaper]'>
						   ";
    		print($escritorio);
    	}
    }*/


?>


<?php
Page::footer();
?>