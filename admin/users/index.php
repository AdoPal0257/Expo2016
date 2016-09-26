<?php
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


  	<?php
  		if ($_SESSION['guardar'] != null) {
  		echo "<div class='input-field col s12 m4'>
			<a href='save.php' class='btn indigo'><i class='material-icons right'>note_add</i>Nuevo</a>
  			</div>";
  		}
  	 ?>
  	
</form>
<?php
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * from usuarios, tipo_usuario WHERE usuarios.Tipo_Usuario = tipo_usuario.Id_Tipo and Apellidos like ? ORDER BY Apellidos";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM usuarios, tipo_usuario WHERE usuarios.Tipo_Usuario = tipo_usuario.Id_Tipo ORDER BY Apellidos";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
	$tabla = "<table class='bordered striped highlight responsive-table'>
				<thead>
		    		<tr>
              			<th data-field='name'>NOMBRE</th>
              			<th data-field='price'>APELLIDOS</th>
              			<th data-field='name'>USERNAME</th>
              			<th data-field='price'>CORREO</th>
              			<th data-field='name'>TIPO USUARIO</th>
              			<th data-field='price'>SEXO</th>
              			<th data-field='name'>FECHA NACIMIENTO</th>
              			<th data-field='name'>FOTO</th>
              			<th data-field='name'>ACCIÓN</th>
		    		</tr>
	    		</thead>
	    		<tbody>";
		foreach($data as $row)
		{
        	$tabla .= "<tr>
		            	<td>$row[Nombres]</td>
		            	<td>$row[Apellidos]</td>
		            	<td>$row[Username]</td>
		            	<td>$row[Email]</td>
		            	<td>$row[Nombre_tipo]</td>
		            	<td>";
	            		if($row['Sexo'] == 1)
						{
							$tabla .= "<p>Mujer</p>";
						}
						else
						{
							$tabla .= "<p>Hombre</p>";
						}
	            		$tabla .= 	"</td>
		            	<td>$row[Fecha_nacimiento]</td>
		            	<td><img src='data:image/*;base64,$row[Foto_Usuario]' class='materialboxed' width='25' height='25' data-caption='$row[Nombres]'></td>
		    			<td>";


  					if ($_SESSION['modificar'] != null) {
  						$tabla .= "<a href='save.php?id=$row[Id_Usuario]' class='btn blue'><i class='material-icons'>mode_edit</i></a>";
  						}
  	 
  	 				if ($_SESSION['eliminar'] != null) {
  						$tabla .= "<a href='delete.php?id=$row[Id_Usuario]' class='btn red'><i class='material-icons'>delete</i></a>";
  						}




		    			$tabla .= "

		            		
							
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