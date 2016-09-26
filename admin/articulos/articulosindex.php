<?php
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Articulos");
?>
<form method='post' class='row'>
	<div class='input-field col s6 m4'>
      	<i class='material-icons prefix'>search</i>
      	<input id='buscar' type='text' name='buscar' class='validate'/>
      	<label for='buscar'>Búsqueda</label>
    </div>
    <div class='input-field col s6 m3'>
    	<button type='submit' class='btn grey left'><i class='material-icons right'>pageview</i>Aceptar</button> 	
  	</div>
  	<div class='input-field col s12 m5'>
		<a href='ArticulosGuardar.php' class='btn indigo'><i class='material-icons right'>note_add</i>Nuevo</a>
		<a href='genereport.php' class='btn indigo'><i class='material-icons right'>note_add</i>Imprimir</a>
  	</div>
</form>
<?php
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * from articulos, tipo_productos WHERE articulos.Tipo_producto = tipo_productos.Id_Tipo_Producto and articulos.Nombre like ? ORDER BY articulos.Nombre";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * from articulos, tipo_productos WHERE articulos.Tipo_producto = tipo_productos.Id_Tipo_Producto ORDER BY articulos.Nombre";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
	$tabla = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>NOMBRE</th>
              			<th data-field='price'>DESCRPCION</th>
              			<th data-field='name'>PRECIO</th>
              			<th data-field='price'>PESO</th>
              			<th data-field='name'>LONGITUD</th>
              			<th data-field='price'>ANCHURA</th>
              			<th data-field='name'>ALTURA</th>
              			<th data-field='name'>TALLA</th>
              			<th data-field='name'>STOCK</th>
              			<th data-field='name'>TIPO</th>
              			<th data-field='name'>ESTADO</th>
		    		</tr>
	    		</thead>
	    		<tbody>";
		foreach($data as $row)
		{
        	$tabla .= "<tr>
		            	<td>$row[Nombre]</td>
		            	<td>$row[Descripcion]</td>
		            	<td>$row[Precio]</td>
		            	<td>$row[Peso]</td>
		            	<td>$row[Longitud]</td>
		            	<td>$row[Anchura]</td>
		            	<td>$row[Altura]</td>
		            	<td>$row[Talla]</td>
		            	<td>$row[Stock]</td>
		            	<td>$row[Nombre]</td>
		            	<td>";
	            		if($row['Estado'] == 1)
						{
							$tabla .= "<p>Activo</p>";
						}
						else
						{
							$tabla .= "<p>Inactivo</p>";
						}
	            		$tabla .= 	"</td>
		    			<td>
		            		<a href='ArticulosGuardar.php?id=$row[Id_Articulo]' class='btn blue'><i class='material-icons'>mode_edit</i></a>
							<a href='ArticulosEliminar.php?id=$row[Id_Articulo]' class='btn red'><i class='material-icons'>delete</i></a>
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