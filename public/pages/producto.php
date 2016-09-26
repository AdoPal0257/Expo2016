<?php 
require('../lib/page.php');
require('../../lib/database.php');
Page::header("TIENDA");
?>
<section id="seccion-uno">

  <!--Boton para mostrar el carrito-->
  <div id="showcart">
  	<a  class="modal-trigger waves-effect waves-light btn-large icon-cart" href="#modal1" target="_blank"> Carrito</a>
  </div>
  
  <!--Carrito-->
  <div id="modal1" class="modal modal-fixed-footer">
	 
     
  <div id='carrito' class="modal-content">
  	

  </div>
  <div class="modal-footer">
  	<a href='confirmar.php' class="modal-action modal-close waves-effect waves-green btn-flat" >Confirmar</a>
    <a href="destruir.php" class="modal-action modal-close waves-effect waves-green btn-flat">Vaciar</a>
  </div>

  </div>



<h4 class='center-align' id='catalogo'>CATALOGO</h4>
	<div class='row'>


	<?php
	
	$sql = "SELECT * FROM imagenes_productos WHERE Id_producto = ? limit 1";
	$params = array($_GET['id']);
	$data = Database::getRows($sql, $params);
	if($data != null)
	{
		$products = "";
		foreach ($data as $row) 
		{
			$products .= "

					
						<div class='col s12 m4 l2'>
			    			
			      				<img class='materialboxed' width='100%'  src='data:image/*;base64,$row[Imagen]'>
			    			
		  				</div>";
			      				
		  				
		}
		print($products);
	}
	else
	{
		print("<div class='card-panel yellow col s12 m4 l2'><i class='material-icons left'>warning</i>No hay productos disponibles en este momento.</div>");
	}
    ?>
	

	<?php
	
	$sql = "SELECT * FROM articulos WHERE articulos.Estado = 1 AND articulos.Id_Articulo = ?";
	$params = array($_GET['id']);
	$data = Database::getRows($sql, $params);
	if($data != null)
	{
		$products = "";
		foreach ($data as $row) 
		{
			$products .= "<div class='col s12 m4 l8'>

							<div class='col s12 m8 l8'>
								<img class='materialboxed' width='100%' src='data:image/*;base64,$row[Imagen]'>
							</div>
			    			<div class='col s12 m4 l4'>
			    				<h4 class='text-darken-4'>$row[Nombre]</h4>
			    				<h6 class='text-darken-4'>$row[Descripcion]</h6>
			    				<h6 class='text-darken-4'>Precio (US$) $row[Precio]</h6>
			    				<p><input id='cantidad' type='number' placeholder='Cantidad' name='cantidad' value='1'></input>
			    					<button id='boton-compra' value='$row[Id_Articulo]' class='waves-effect waves-light btn'>
			      						
			      						<i class='icon-cart left'></i>Comprar
			      						
			      					</button>
							</div>


						<div class='col s12 m12 l12'>
		 					<ul class='collapsible' data-collapsible='accordion'>
    							<li>
      								<div class='collapsible-header'><i class='icon-menu3'></i>Todos los detalles</div>
      								<div class='collapsible-body'><p>Descripción: $row[Descripcion]</p></div>

      								<div class='collapsible-body col s4 m4 l4'><p>Talla: $row[Talla]</p></div>
      								<div class='collapsible-body col s4 m4 l4'><p>Anchura: $row[Anchura]</p></div>
      								<div class='collapsible-body col s4 m4 l4'><p>Altura: $row[Altura]</p></div>
      								

      								<div class='collapsible-body col s6 m6 l6'><p>Peso: $row[Peso]</p></div>
      								<div class='collapsible-body col s6 m6 l6'><p>Longitud: $row[Longitud]</p></div>

      								
    							</li>

  							</ul>

						</div>

		  				</div>

		  				";
		}
		print($products);
	}
	else
	{
		print("<div class='card-panel yellow col s12 m4 l8''><i class='material-icons left'>warning</i>No hay productos disponibles en este momento.</div>");
	}
    ?>


    <?php
	
	$consulta = "SELECT * FROM articulos  WHERE articulos.Estado = 1 and Stock > 0 LIMIT 2";
	
	$data = Database::getRows($consulta, null);
	if($data != null)
	{
		$products = "";
		foreach ($data as $row) 
		{
			$products .= "<div class='card col s12 m4 l2'>
			    			<div class='card-image waves-effect waves-block waves-light' href='producto.php?id=$row[Id_Articulo]'>

			      				<img class='activator' src='data:image/*;base64,$row[Imagen]'>
			    			</div>
			    			<div class='card-content'>
			      				<span class='card-title activator grey-text text-darken-4'><i class='material-icons right' >more_vert</i></span>
			    			</div>
			    			<div class='card-reveal'>
			      				<span class='card-title grey-text text-darken-4'>$row[Nombre]<i class='material-icons right'>close</i></span>
			      				<p>$row[Descripcion]</p>
			      				<p>Precio (US$) $row[Precio]</p>
			      				<a class='waves-effect waves-light btn' href='producto.php?id=$row[Id_Articulo]' value='$row[Id_Articulo]'><i class='icon-eye left'></i>Ver más</a>
			    			</div>
		  				</div>";
		}
		print($products);
	}
	else
	{
		print("<div class='card-panel yellow col s12 m4 l2'><i class='material-icons left'>warning</i>No hay productos disponibles en este momento.</div>");
	}
    ?>

  	</div> 


</section>

<?php
Page::footer();
?>