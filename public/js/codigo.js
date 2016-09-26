$(document).ready(inicio)
function inicio(){
	$("#boton-compra").click(anade)
	$("#carrito").load("poncarrito.php");
}
function anade(){
	var cantidad=document.getElementById("cantidad").value;
	$("#carrito").load("poncarrito.php?"+$.param(
    {p: $(this).val(),c: cantidad}
));

}