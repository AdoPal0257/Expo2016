<?php 
require('../lib/page.php');
Page::header("TIENDA");
?>

<section id="seccion-uno">




<div id='index-banner' class="parallax-container">
	<div class="parallax">
		<img src="../img/p3.jpg">
	</div>
    <div class='section no-pad-bot'>

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


    	<div class='container'>
      		<br><br>
      		<h1 class='header center teal-text text-lighten-2'>Galaxy store</h1>
      	<div class='row center'>
          	<h5 class='header col s12 light'>Mira todo lo que tenemos para ofrecerte en nuestra tienda online</h5>

      	</div>
      	<nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
      	</div>
    </div>
</div>

<div class='container'>
 <div class='row'>
    

<h4 class='center-align' id='catalogo'>CATALOGO</h4>
	<div class='row'>
	<?php
	require('../../lib/database.php');
	$sql = "SELECT * FROM articulos  WHERE articulos.Estado = 1 and Stock > 0";
	
	$data = Database::getRows($sql, null);
	if($data != null)
	{
		$products = "";
		foreach ($data as $row) 
		{
			$products .= "<div class='card col s12 m4 '>
			    			<div class='card-image waves-effect waves-block waves-light' href='producto.php?id=$row[Id_Articulo]'>

			      				<img class='activator' src='data:image/*;base64,$row[Imagen]'>
			    			</div>
			    			<div class='card-content'>
			      				<span class='card-title activator grey-text text-darken-4' href='producto.php?id=$row[Id_Articulo]'>$row[Nombre]<i class='material-icons right' >more_vert</i></span>

			      				<p>
			      				<a class='waves-effect waves-light btn' href='producto.php?id=$row[Id_Articulo])' value='$row[Id_Articulo]'><i class='icon-eye left'></i> Ver más</a>
			   
			      				</p>
			    			</div>
			    			<div class='card-reveal'>
			      				<span class='card-title grey-text text-darken-4'>$row[Nombre]<i class='material-icons right'>close</i></span>
			      				<p>$row[Descripcion]</p>
			      				<p>Precio (US$) $row[Precio]</p>
			    			</div>
		  				</div>";
		}
		print($products);
	}
	else
	{
		print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay productos disponibles en este momento.</div>");
	}
    ?>
  	</div> 

</div>
</section>
<?php
Page::footer();
?>