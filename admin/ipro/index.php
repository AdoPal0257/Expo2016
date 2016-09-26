<?php
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Imagenes");
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
		<a href='GuardarIp.php' class='btn indigo'><i class='material-icons right'>note_add</i>Nuevo</a>
  	</div>
</form>
<?php
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * from imagenes_productos, tipo_imagen WHERE imagenes_productos.Tipo_Imagen = tipo_imagen.Id_Tipo_imagen and imagenes_productos.Id_producto = articulos.Id_Articulo  and imagenes_productos.Titulo like ? ORDER BY imagenes_productos.Titulo";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * from imagenes_productos, tipo_imagen, articulos WHERE imagenes_productos.Tipo_Imagen = tipo_imagen.Id_Tipo_imagen and imagenes_productos.Id_producto = articulos.Id_Articulo ORDER BY imagenes_productos.Titulo";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
	$tabla = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>ARTICULO</th>
              			<th data-field='price'>TITULO</th>
              			<th data-field='name'>DESCRIPCION</th>
              			<th data-field='price'>TIPO IMAGEN</th>
              			<th data-field='name'>IMAGEN</th>
		    		</tr>
	    		</thead>
	    		<tbody>";
		foreach($data as $row)
		{
        	$tabla .= "<tr>
		            	<td>$row[Nombre]</td>
		            	<td>$row[Titulo]</td>
		            	<td>$row[Descripcion]</td>
		            	<td>$row[Nombre_tipo_imagen]</td>
		               <td><img src='data:image/*;base64,$row[Imagen]' class='materialboxed' width='25' height='25' data-caption='$row[Titulo]'></td>
		    			<td>
		            		<a href='Guardarip.php?id=$row[Id_imagen]' class='btn blue'><i class='material-icons'>mode_edit</i></a>
							<a href='Eliip.php?id=$row[Id_imagen]' class='btn red'><i class='material-icons'>delete</i></a>
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