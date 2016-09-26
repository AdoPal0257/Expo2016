<?php
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Multimedia");
?>
<form method='post' class='row'>
	<div class='input-field col s6 m4'>
      	<i class='material-icons prefix'>search</i>
      	<input id='buscar' type='text' name='buscar' class='validate'/>
      	<label for='buscar'>Búsqueda</label>
    </div>
    <div class='input-field col s6 m4'>
    	<button type='submit' class='btn grey left'><i class='material-icons right'>pageview</i>Aceptar</button> 	
  	</div>
  	<div class='input-field col s12 m4'>
		<a href='save.php' class='btn indigo'><i class='material-icons right'>note_add</i>Nuevo</a>
  	</div>
</form>
<?php
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT Id_Multimedia, Titulo, Descripcion, tipo_multimedia.Nombre_Tipo_Multimedia, Imagen from multimedia, tipo_multimedia WHERE  multimedia.Tipo = tipo_multimedia.Id_Tipo_multimedia and Titulo like ? ORDER BY Titulo ";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT Id_Multimedia, Titulo, Descripcion, tipo_multimedia.Nombre_Tipo_Multimedia, Imagen from multimedia, tipo_multimedia WHERE  multimedia.Tipo = tipo_multimedia.Id_Tipo_multimedia ORDER BY Titulo ";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
	$tabla = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>Titulo</th>
              			<th data-field='price'>Descripcion</th>
              			<th data-field='name'>Tipo</th>
              			<th data-field='price'>Imagen</th>
      		    		</tr>
	    		</thead>
	    		<tbody>";
		foreach($data as $row)
		{
        	$tabla .= "<tr>
		            	<td>$row[Titulo]</td>
		            	<td>$row[Descripcion]</td>
		            	<td>$row[Nombre_Tipo_Multimedia]</td>
		            	  	<td><img src='data:image/*;base64,$row[Imagen]' class='materialboxed' width='25' height='25' data-caption='$row[Titulo]'></td>
		    			
		    			<td>
		            		<a href='save.php?id=$row[Id_Multimedia]' class='btn blue'><i class='material-icons'>mode_edit</i></a>
							<a href='delete.php?id=$row[Id_Multimedia]' class='btn red'><i class='material-icons'>delete</i></a>
						</td>
					</tr>";
		}
		$tabla .= "</tbody>
    		</table>";
	print($tabla);
}
else
{
	print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay registros.</div>");
}
Page::footer();
?>