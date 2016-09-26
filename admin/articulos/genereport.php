<?php
require_once('../lib/app/lib/pdf/mpdf.php');
$conn = new mysqli('localhost', 'root', '', 'galaxydb');
$query = "SELECT Nombre, count(*) FROM linea_pedidos, articulos WHERE articulos.Id_Articulo = linea_pedidos.Id_producto GROUP BY Nombre
order by  count(*) DESC ";
$prepare = $conn->prepare($query);
$prepare->execute();
$resultSet = $prepare->get_result();
while ($pro[]= $resultSet->fetch_array());
 $resultSet->close();
 $prepare->close();
 $conn->close();
$n=1;

 date_default_timezone_set("America/El_Salvador");
     $fe= date("d/m/Y");
     $ho= date("h:i:a");
        

$html = '<header class="clearfix">
      <div id="logo">
     <img src="../img/logo.png">
      </div>
      <div id="company">
        <h2 class="name">Galaxy Bowling</h2>
        <div>75 Av Nte o Napoleon viera Altamirano, San Salvador</div>
        <div>(503) 2511 8900</div>
        <div><a href="#">Galaxybowling.ExpoRicaldone16@gmail.com</a></div>
      </div>
</div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Reporte de:</div>
          <h2 class="name">Los Productos mas Vendido</h2>
          </div>
        <div id="invoice">
          <div class="date">Fecha: '.$fe.'</div>
          <div class="date">Hora: '.$ho.'</div>';
        $html .='</div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no"><h3>#</h3></th>
            <th class="unit"><h3>Producto mas Vendido</h3></th>
           </tr>
        </thead>
        <tbody>';
        foreach ($pro as $p) {
        	$html .='<tr>
          <td class="no">'.$n++.'</td>
            <td class="service">'.$p['Nombre'].'</td>
            </tr>';}      
      $html .='
        </tbody>
      </table>      
    </main>';

$mpdf= new mPDF('c','A4');
$css=file_get_contents('../css/style.css');
$mpdf->writeHTML($css, 1);
$mpdf-> writeHTML($html);
$mpdf->Output('reporte.pdf', 'I');
?>