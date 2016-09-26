<?php 
require('../lib/pagepaquete.php');
require("../../lib/database.php");
Page::header("COMPROBANTE");



?>


<div id="centro">
	<div id="izquierda">
	
		<div class="row">
		<!--inicia el rows de paquetes-->
		<?php
      $sql = "SELECT * FROM paquetes  WHERE paquetes.Estado = 1";
      
      $data = Database::getRows($sql, null);

      $paquetes="";

		foreach ($data as $row) 
        {
          $titulo ="$row[Nombre]";
          $id ="$row[Id_Paquete]";
          $precio ="$row[Precio]";
          $descripcion ="$row[Descripcion]";
		 $paquetes .= "
		      <div class='col s12 m12 l12'>
		        <div class='card-panel grey darken-4'>
		         <span id='titulo' class='white-text'>$titulo</span>
		        <div class='divider'></div>
		        <div class='row'>
		        	 <span  class='white-text'>$descripcion</span>
		        </div>
		          <div class='row'> 
		          		<span id='fliz' class='white-text'>Precio: $precio</span>
		          <button id='floder' value='$row[Precio]'>
			      					<a class='waves-effect waves-light btn'>
			      						<i class='material-icons left'>cloud</i>Comprar
			      					</a>
			      				</button>

		          </div>    
		        </div>
		      </div>
		 ";
		}
		print($paquetes);
		 ?>
		<!--finaliza el rows de paquetes-->
    </div>

	</div>
	<div id="derecha">
		
	</div>
</div>

<?php
Page::footer();
?>