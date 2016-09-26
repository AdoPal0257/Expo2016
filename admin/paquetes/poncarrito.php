<?php 
$suma = 0;

session_start();
//if(isset($_GET['p'],$_GET['c']))
if(isset($_GET['p']))
{
	$_SESSION['producto2'][$_SESSION['contador2']] = $_GET['p'];
    $_SESSION['contador2']++;
}

$conexion = mysqli_connect("localhost","admin","admin","galaxydb");
	mysqli_set_charset($conexion, "utf8");
echo "<table>";
for ($i=0; $i < $_SESSION['contador2']; $i++) { 
	//echo "Producto: ".$_SESSION['producto'][$i]."<br>";
	$peticion = "SELECT * FROM articulos where Id_Articulo=".$_SESSION['producto2'][$i]."";
	$resultado = mysqli_query($conexion, $peticion);
	$cantidad = 2;
	if($resultado != null)
	{
		while ($fila = mysqli_fetch_array($resultado)) {
			$subtotal = $fila['Precio'] * $cantidad;
			echo "<tr style='color:white'><td>".$fila['Nombre']." </td><td> ".$fila['Precio']."<td><td> ".$cantidad."<td><td> ".$subtotal."<td></tr>";

			$suma += $subtotal;
		}
		
	}
	else
	{
		print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No se ha agregado productos al carrito.</div>");
	}
}
echo "<tr style='color:white'><td>Pecio Sugerido ($)</td><td>".number_format($suma,2)."</td></tr>";
echo "</table>";
mysqli_close($conexion);
?>