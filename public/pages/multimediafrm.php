<?php 
require('../lib/page.php');
Page::header("MULTIMEDIA");
?>
<section id="seccion-uno">
  <div class="parallax-container">
   
     <iframe width="100%" height="100%" src="https://www.youtube.com/embed/WF_bV5LYftg?rel=0" frameborder="0" allowfullscreen></iframe>
    
  </div>




<h4 class='center-align' id='multimedia'>Multimedia</h4>
  <div class='row'>
  <?php
  require('../../lib/database.php');
  $sql = "SELECT * FROM multimedia";
  
  $data = Database::getRows($sql, null);
  if($data != null)
  {
    $products = "";
    foreach ($data as $row) 
    {
      $products .= 
 
              "

<div class='col s12 m6 l4'>
  <div class='card'>
    <div class='card-image waves-effect waves-block waves-light'>
      <img class='activator' src='data:image/*;base64,$row[Imagen]' placeholder='1200x1200px máx., 2MB máx., PNG/JPG/GIF'>
    </div>
    <div class='card-content'>
      <span class='card-title activator grey-text text-darken-4'>$row[Titulo]<i class='material-icons right'>more_vert</i></span>
    </div>
    <div class='card-reveal'>
      <span class='card-title grey-text text-darken-4'> $row[Titulo] <i class='material-icons right'>close</i></span>
      <p>$row[Descripcion]</p>
    </div>
  </div>
  </div>



"
              ;
    }
    print($products);
  }
  else
  {
    print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay productos disponibles en este momento.</div>");
  }
    ?>
    </div> 

</section>
<?php
Page::footer();
?>
