<?php
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Tipo Usuario");
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
	$sql = "SELECT * from tipo_usuario where Nombre_tipo like ? ORDER BY Nombre_tipo";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM tipo_usuario ";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
	$tabla = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>Tipo de Usuario</th>
              			<th data-field='name'>Usuarios</th>
              			<th data-field='name'>Tipo usuario</th>
              			<th data-field='name'>Articulos</th>
              			<th data-field='name'>Tipo producto</th>
              			<th data-field='name'>Imagenes productos</th>
              			<th data-field='name'>Paquetes</th>
              			<th data-field='name'>Pedidos</th>
              			<th data-field='name'>Multimedia</th>
              			<th data-field='name'>Tipo multimedia</th>
              			<th data-field='name'>Tipo imagen</th>
              			<th data-field='name'>Guardar</th>
              			<th data-field='name'>Modificar</th>
              			<th data-field='name'>Eliminar</th>
              			
              			
		    		</tr>
	    		</thead>
	    		<tbody>";
		foreach($data as $row)
		{
			error_reporting(0);
        	$tabla .= "<tr>
		            	<td>$row[Nombre_tipo]</td>
		            	";

		            	if ($row[usuario] == 1) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[usuario]</td>
		            		";
		            	}

		            	if ($row[tipo_usuario] == 2) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[tipo_usuario]</td>
		            		";
		            	}

		            	if ($row[articulo] == 3) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[articulo]</td>
		            		";
		            	}

		            	if ($row[tipo_producto] == 4) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[tipo_producto]</td>
		            		";
		            	}

		            	if ($row[img_producto] == 5) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[img_producto]</td>
		            		";
		            	}

		            	if ($row[paquetes] == 6) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[paquetes]</td>
		            		";
		            	}

		            	if ($row[pedidos] == 7) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[pedidos]</td>
		            		";
		            	}

		            	if ($row[multimedia] == 8) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[multimedia]</td>
		            		";
		            	}

		            	if ($row[tipo_multimedia] == 9) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[tipo_multimedia]</td>
		            		";
		            	}

		            	if ($row[tipo_img] == 10) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[tipo_img]</td>
		            		";
		            	}

		            	if ($row[guardar] == 11) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[guardar]</td>
		            		";
		            	}

		            	if ($row[modificar] == 12) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[modificar]</td>
		            		";
		            	}

		            	if ($row[eliminar] == 13) {
		            		$tabla.="
		            			<td>✔</td>
		            		";
		            	}else{
		            		$tabla.="
		            			<td>$row[eliminar]</td>
		            		";
		            	}

		            	$tabla.=
		            	"
		            	
		       
		            	
		    			<td>
		            		<a href='save.php?id=$row[Id_Tipo]' class='btn blue'><i class='material-icons'>mode_edit</i></a>
							<a href='delete.php?id=$row[Id_Tipo]' class='btn red'><i class='material-icons'>delete</i></a>
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