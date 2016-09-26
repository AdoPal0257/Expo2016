<?php 
$suma = 0;

session_start();

if(isset($_GET['p'],$_GET['c']))
{
	$_SESSION['producto'][$_SESSION['contador']] = $_GET['p'];
	$_SESSION['cantidad'][$_SESSION['contador']] = $_GET['c'];
    $_SESSION['contador']++;
}

$conexion = mysqli_connect("localhost","admin","admin","galaxydb");
mysqli_set_charset($conexion, "utf8");

echo "
 <h4><a class='icon-cart'></a> Carrito de compras</h4>
      <p>Recuerda verificar siempre tu pedido antes de enviarlo.</p>

		<table class='highlight'>
        <thead>
          <tr>
              <th data-field=''>Producto</th>
              <th data-field=''>Precio ($)</th>
              <th data-field=''>Cantidad</th>
              <th data-field=''>Sub-total ($)</th>
          </tr>
        </thead>

";


for ($i=0; $i < $_SESSION['contador']; $i++) { 
	
	$peticion = "SELECT * FROM articulos where Id_Articulo=".$_SESSION['producto'][$i]."";
	$resultado = mysqli_query($conexion, $peticion);
	$cantidad = $_SESSION['cantidad'][$i];
	if($resultado != null)
	{
		while ($fila = mysqli_fetch_array($resultado)) {
			$subtotal = $fila['Precio'] * $cantidad;
			echo "



			 <tbody>
          <tr>
            <td>".$fila['Nombre']." </td>
            <td> ".$fila['Precio']."</td>
            <td> ".$cantidad."</td>
            <td> ".$subtotal."</td>
          </tr>





		";

			$suma += $subtotal;
		}
		
	}
	else
	{
		print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No se ha agregado este producto al carrito.</div>");
	}
}
echo "<tr>
	<td></td>
	<td></td>
	  <td>Total ($):</td>
	  <td>".number_format($suma,2)."</td>
	  </tr>";
echo "</tbody>
</table>";
mysqli_close($conexion);
?>