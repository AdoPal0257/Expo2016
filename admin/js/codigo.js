$(document).ready(inicio)
function inicio(){
	$(".boton-compra").click(anade)
	$("#carrito").load("poncarrito.php");
}
function anade(){
	$("#carrito").load("poncarrito.php?p="+$(this).val());

}