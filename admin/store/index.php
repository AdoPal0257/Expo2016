<?php
error_reporting(E_ALL ^ E_NOTICE);
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Usuarios");
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
</form>
<?php
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM pedidos  LEFT JOIN usuarios on pedidos.Id_Cliente = usuarios.Id_Usuario WHERE Estado like ? order by Estado, Fecha asc";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM pedidos LEFT JOIN usuarios on pedidos.Id_Cliente = usuarios.Id_Usuario order by Estado, Fecha asc";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
	$tabla = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>PEDIDO</th>
              			<th data-field='price'>CLIENTE</th>
              			<th data-field='name'>FECHA</th>
              			<th data-field='price'>ESTADO</th>
		    		</tr>
	    		</thead>
	    		<tbody>";
		foreach($data as $row)
		{

			$fecha = date("M d Y H:i:s", $row[Fecha]);
			$estado = $row[Estado];
			switch ($estado) {
				case '0':$diestado = 'No entregado';break;
				case '1':$diestado = 'Entregado';break;
				case '2':$diestado = 'Cancelado';break;
			}
			
        	$tabla .= "<tr>
		            	<td>$row[Id_Pedido]</td>
		            	<td>$row[Nombres] $row[Apellidos]</td>
		            	<td>$fecha</td>
		            	<td>$diestado</td>
		            	<td>
		            		<a href='gestionar.php?id=$row[Id_Pedido]' class='btn blue'><i class='material-icons'>mode_edit</i></a>
							<a href='entregado.php?id=$row[Id_Pedido]' class='btn red'><i class='material-icons'>delete</i></a>
							<a href='cancelado.php?id=$row[Id_Pedido]' class='btn red'><i class='material-icons'>delete</i></a>
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