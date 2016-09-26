<?php
require("../lib/page2.php");
require("../../lib/database.php");
Page::header("Paquetes");
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
	$sql = "SELECT * from paquetes where Nombre like ? ORDER BY Nombre";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * from paquetes WHERE Estado=1 ORDER BY Nombre";
	$params = null;
	$sql2 = "SELECT * from paquetes  WHERE Estado=0 ORDER BY Nombre";
}
$data = Database::getRows($sql, $params);
$data2 = Database::getRows($sql2,$params);

if($data != null || $data2 != null)
{
	$tabla = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>NOMBRE</th>
              			<th data-field='price'>PRECIO</th>
              			<th data-field='name'>DESCRIPCION</th>
              			<th data-field='price'>ESTADO</th>
                 	</tr>
	    		</thead>
	    		<tbody>";
		foreach($data as $row)
		{
        	$tabla .= "<tr>
		            	<td>$row[Nombre]</td>
		            	<td>$row[Precio]</td>
		            	<td>$row[Descripcion]</td>
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
		            		<a href='guardarip.php?id=$row[Id_Paquete]' class='btn blue'><i class='material-icons'>mode_edit</i></a>
							<a href='desactivar.php?id=$row[Id_Paquete]' class='btn red'><i class='material-icons'>delete</i></a>
						</td>
					</tr>";
		}
		$tabla .= "</tbody>
    		</table>";


$tabla2 = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>NOMBRE</th>
              			<th data-field='price'>PRECIO</th>
              			<th data-field='name'>DESCRIPCION</th>
              			<th data-field='price'>ESTADO</th>
                 	</tr>
	    		</thead>
	    		<tbody>";
		foreach($data2 as $row)
		{
        	$tabla2 .= "<tr>
		            	<td>$row[Nombre]</td>
		            	<td>$row[Precio]</td>
		            	<td>$row[Descripcion]</td>
		            	<td>";
	            		if($row['Estado'] == 1)
						{
							$tabla2 .= "<p>Activo</p>";
						}
						else
						{
							$tabla2 .= "<p>Inactivo</p>";
						}
	            		$tabla2 .= 	"</td>
		    			<td>
		            		<a href='guardarip.php?id=$row[Id_Paquete]' class='btn blue'><i class='material-icons'>mode_edit</i></a>
							<a href='activar.php?id=$row[Id_Paquete]' class='btn red'><i class='material-icons'>delete</i></a>
						</td>
					</tr>";
		}
		$tabla2 .= "</tbody>
    		</table>";


$body = " <div class='row '>
    <div class='col s12 '>
      <ul class='tabs'>
        <li class='tab col s8 m6 l5 '><a class='active'  href='#activo'>Paquetes Activos</a></li>
        <li class='tab col s8 m6 l5'><a href='#inactivo'>Paquetes Inactivos</a></li>
      </ul>
    </div>
    <div id='activo' class='col s12 '>$tabla</div>
    <div id='inactivo' class='col s12'>$tabla2</div>
  </div>";




	print($body);
}
else
{
	print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay registros.</div>");
}
Page::footer();
?>