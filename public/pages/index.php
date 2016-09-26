<?php
require("../lib/page.php");
require('../../lib/database.php');
Page::header("TIENDA");
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7&appId=511885375673871";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="social">
  <ul>
    <li><a href="https://www.facebook.com/galaxybowlingsv/?fref=ts" target="_blank" class="icon-facebook"></a></li>
    <li><a href="https://twitter.com/galaxybowlingsv" target="_blank" class="icon-twitter"></a></li>
    <li><a href="https://www.instagram.com/explore/locations/270809864/" target="_blank" class="icon-instagram"></a></li>
  </ul>
</div>

<div id="slider" class="carousel carousel-slider center" data-indicators="true">
  <div  class='carousel-fixed-item center'>
    <a href='#seccion-uno' class='btn-floating btn-large waves-effect waves-light teal lighten-1'>
    <i class='mdi-navigation-expand-more material-icons'><i class='large material-icons'>keyboard_arrow_down</i></i>
    </a>
  </div>
     
  <div id="banner" class="carousel-item black-text" href="#one!">
    <h2>Galaxy bowling</h2>
    <p class="white-text">Aquí debe ir texto</p>
  </div>
  <div id="banner2" class="carousel-item amber white-text" href="#two!">
    <h2>Galaxy bowling</h2>
    <p class="white-text">Aquí debe ir texto</p>
  </div>
  <div id="banner3" class="carousel-item green white-text" href="#three!">
    <h2>Galaxy bowling</h2>
    <p class="white-text">Aquí debe ir texto</p>
  </div>
  <div id="banner4" class="carousel-item blue white-text" href="#four!">
    <h2>Galaxy bowling</h2>
    <p class="white-text">Aquí debe ir texto</p>
  </div>
  <div id="banner5" class="carousel-item blue white-text" href="#four!">
    <h2>Galaxy bowling</h2>
    <p class="white-text">Aquí debe ir texto</p>
  </div>
</div>
  
<!--Inicio del cuerpo-->
<section id="seccion-uno">  
  <div class="section">
    <div class="row">


      <div class="col s12 m12 l12" >
        <ul class="tabs">
          <li class="tab col s4"><a href="#tabs1" id="tabmenu">Información</a></li>
          <li class="tab col s4"><a href="#tabs3" class="active">Lo nuevo</a></li>
          <li class="tab col s4"><a href="#tabs2">Servicios</a></li>
          
        </ul>
      </div>

      <div id="tabs1" class="col s12 m12 l12">
      
        
          <div class="col s12 m6 l6">
            <p class="centrado">Es imposible perderte, mira cómo llegar a nuestras instalaciones, te estamos esperando, será un gusto atenderte.</p>
              <br>
              <iframe id="mapa" class="uk-align-center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.2518647885995!2d-89.23546878563965!3d13.703189802111199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63303de9cdbe3d%3A0x67e18464d41aae44!2sGalaxy+Bowling!5e0!3m2!1ses-419!2ssv!4v1460421131070" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
               <a href="mapa.html"><button class='btn blue' name="enviar" value="Enviar" href='mapa.html'><i class='material-icons right'>navigation</i>Cómo llegar</button></a>
          </div>

          <div class="col s12 m6 l6">
            <p class="centrado">Si tienes alguna duda puedes contactarte sin problemas.</p>
            <form method='post' class='row' enctype='multipart/form-data'>
              <div class='input-field col s12 m12 l12'>
                <div class='input-field col s6 m6 l6'>
                  <i class="material-icons prefix">account_circle</i>
                    <input id="nombre" type="text" name="nombre" pattern="^[a-zA-Z\s]+$" class="validate" length='50' maxlenght='50' required>
                    <label for="nombre" data-error="Ingrese bien su nombre, solo letras." data-success="Nombre valido">Nombre</label>
                </div>

                <div class='input-field col s6 m6 l6'>
                  <i class="material-icons prefix">email</i>
                    <input id="email" type="text" name="email" pattern="^[a-zA-Z\s]+$"  class="validate" length='75' maxlenght='100' required>
                    <label for="email" data-error="Ingrese un correo electrónico válido." data-success="Correcto">E-mail</label>
                </div>
                </div>
                <div class='input-field col s12 m12 l12'>
                  <i class="material-icons prefix">textsms</i>
                    <input id="mensaje" type="text" name="mensaje" pattern="^[a-zA-Z\s]+$"  class="materialize-textarea" length='500' maxlenght='500' required>
                    <label for="mensaje" data-error="" data-success="Correcto">Asunto</label>
                </div>
              <button type='submit' class='btn blue' name="enviar" value="Enviar"><i class='material-icons right'>send</i>Enviar</button>
            </form>
             
          </div>
          <div class="col s12 m12 l8 offset-l2">
              <table class="striped bordered centered">
        <thead>
          <tr>
              <th data-field="id">Lunes a viernes</th>
              <th data-field="name">Sábado y domingo</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>-3:00 p.m. a 5:30 p.m.</td>
            <td>-10:30 a.m. a 1:00 p.m.</td>
          </tr>
          <tr>
            <td>-3:30 p.m. a 6:00 p.m.</td>
            <td>-11:30 a.m. a 2:00 p.m.</td>
          </tr>
          <tr>
            <td>-6:30 p.m. a 9:00 p.m.</td>            
            <td>-2:30 p.m. a 5:00 p.m.</td>
          </tr>
          <tr>
            <td></td>            
            <td>-3:30 p.m. a 6:00 p.m.</td>
          </tr>
          <tr>
            <td></td>            
            <td>-6:30 p.m. a 9:00 p.m.</td>
          </tr>
        </tbody>
      </table>
          </div>

      </div>

      <div id="tabs3" class="col s12 m12 l12">  
        <div class="section" >
      
            <div class="col s12 m6 l4">      
              <div class="fb-post" data-href="https://www.facebook.com/permalink.php?story_fbid=552012555001761&amp;id=337109666492052" data-width="100%" data-show-text="true">
              <blockquote cite="https://www.facebook.com/permalink.php?story_fbid=552012555001761&amp;id=337109666492052" class="fb-xfbml-parse-ignore"><p>GRAN &#xc9;XITO EN EL OPEN 2016
              1er Lugar: Mauricio Galdamez con 626
              2o Lugar: Cesar Galdamez con 615
              3er Lugar: Marvin...</p>Posted by <a href="https://www.facebook.com/Liga-De-Cheros-Y-Cheras-337109666492052/">Liga De Cheros Y Cheras</a> on&nbsp;<a href="https://www.facebook.com/permalink.php?story_fbid=552012555001761&amp;id=337109666492052">jueves, 22 de septiembre de 2016</a></blockquote>
              </div>
            </div>
            <div class="col s12 m6 l4">
              <div class="fb-post" data-href="https://www.facebook.com/galaxybowlingsv/posts/1327948927251908:0" data-width="100%" data-show-text="true">
              <blockquote cite="https://www.facebook.com/galaxybowlingsv/posts/1327948927251908:0" class="fb-xfbml-parse-ignore"><p>&#xa1;T&#xda; PUEDES SER LA ESTRELLA DE NUESTRA PR&#xd3;XIMA PUBLICACI&#xd3;N EN EL PERI&#xd3;DICO!

              Sube una fotograf&#xed;a de tus peque&#xf1;os...</p>Posted by <a href="https://www.facebook.com/galaxybowlingsv/">Galaxy Bowling</a> on&nbsp;<a href="https://www.facebook.com/galaxybowlingsv/posts/1327948927251908:0">lunes, 12 de septiembre de 2016</a></blockquote></div>
            </div>
            <div class="col s12 m6 l4">
                <div class="fb-post" data-href="https://www.facebook.com/fesabowl/posts/574194149416622" data-width="100%" data-show-text="true"><blockquote cite="https://www.facebook.com/fesabowl/posts/574194149416622" class="fb-xfbml-parse-ignore"><p>Hoy inici&#xf3; el 1er Campeonato Juvenil de Parejas en las instalaciones de la FESABOWL. Suerte a todos los participantes.</p>Posted by <a href="https://www.facebook.com/fesabowl/">Fesabowl</a> on&nbsp;<a href="https://www.facebook.com/fesabowl/posts/574194149416622">viernes, 13 de mayo de 2016</a></blockquote></div>
            </div>


        </div>
      </div>
  

      <div id="tabs2" class="col s12 m12 l12"> 
        <div class="section" >
      
            <div class="col s12 m6 l6">
             
               <p class="centrado">Mira todo lo nuevo que hay para ti en nuestra tienda on-line.</p>

         
                <?php

                  $sql = "SELECT Id_Articulo,Nombre,Descripcion,Precio,Imagen FROM articulos  WHERE articulos.Estado = 1  and Stock > 0 and Id_Articulo = (SELECT max(Id_Articulo) FROM articulos WHERE articulos.Estado = 1  and Stock > 0)";
             
                  $data = Database::getRows($sql, null);
                    if($data != null)
                    {
                      $products = "";
                      foreach ($data as $row) 
                      {
                        $products .= "<div class='card col s12 m12 l12'>
                                        <div class='card-image waves-effect waves-block waves-light' href='producto.php?id=$row[Id_Articulo]'>
                                          <img class='activator' src='data:image/*;base64,$row[Imagen]'>
                                        </div>

                                        <div class='card-content'>
                                          <span class='card-title activator grey-text text-darken-4' href='producto.php?id=$row[Id_Articulo]'>$row[Nombre]<i class='material-icons right' >more_vert</i></span>
                                      <p>
                                        <a class='waves-effect waves-light btn' href='producto.php?id=$row[Id_Articulo]' value='$row[Id_Articulo]'><i class='icon-eye left'></i>Ver más</a>
                                      
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

            <div class="col s12 m6 l6">
              
             <p class="centrado">Si celebrar a lo grande quieres, dale un vistazo a nuestra diversidad de paquetes fiesteros.</p>

             <?php

                  $sql = "SELECT Id_Articulo,Nombre,Descripcion,Precio,Imagen FROM articulos  WHERE articulos.Estado = 1  and Stock > 0 and Id_Articulo = (SELECT max(Id_Articulo) FROM articulos WHERE articulos.Estado = 1  and Stock > 0)";
             
                  $data = Database::getRows($sql, null);
                    if($data != null)
                    {
                      $products = "";
                      foreach ($data as $row) 
                      {
                        $products .= "<div class='card col s12 m12 l12'>
                                        <div class='card-image waves-effect waves-block waves-light' href='producto.php?id=$row[Id_Articulo]'>
                                          <img class='activator' src='data:image/*;base64,$row[Imagen]'>
                                        </div>

                                        <div class='card-content'>
                                          <span class='card-title activator grey-text text-darken-4' href='producto.php?id=$row[Id_Articulo]'>$row[Nombre]<i class='material-icons right' >more_vert</i></span>
                                      <p>
                                        <a class='waves-effect waves-light btn' href='producto.php?id=$row[Id_Articulo]' value='$row[Id_Articulo]'><i class='icon-eye left'></i>Ver más</a>
                                      
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
      </div>

      
  
    </div>    
  </div>  



<div id='index-banner' class='parallax-container'>
  <div class='section no-pad-bot'>
    <div class='container'>
      <br><br>
      <h1 class='header center text-lighten-2' style="color:#af3981">GALAXY FUN PLAZA</h1>
      <div class='row center'>
          <h4 class='header col s12 light ' style="color:#81a63a">¿Quieres comenzar a jugar?</h4>
      </div>
      <div class='row center'>

        <!-- Modal Trigger -->
        <a class='waves-effect waves-light btn modal-trigger' href='#modal1'>¡JUEGA YA!</a>

          <!-- Modal Structure -->
          <div id='modal1' class='modal'>
            <div class='modal-content'>
              <h4 class='header center text-lighten-2' style="color:#af3981">Selecciona un juego</h4>
              <p class='header col s12 light ' style="color:#81a63a">¡Diviértete y mejorar tu técnica con estos entretenidos juegos de Bowling!</p>
              <div class='col s12 m12 l12'>

                
                <div class='col s12 m6 l6'>
                    <iframe src='http://www.minijuegostop.com.mx/showFlash.php?id=17744' width='100%' height='275' frameborder=0></iframe>
            
                </div>
                <div class='col s12 m6 l6'>

                    <iframe src='http://www.minijuegostop.com.mx/showFlash.php?id=15035' width='100%' height='275' frameborder=0></iframe>
            
                </div>
                <div class='col s12 m6 l6'>

                    <iframe src='http://www.minijuegostop.com.mx/showFlash.php?id=17675' width='100%' height='275' frameborder=0></iframe>
            
                </div>
                <div class='col s12 m6 l6'>

                    <iframe src='http://www.minijuegostop.com.mx/showFlash.php?id=294' width='100%' height='275' frameborder=0></iframe>
                </div>

            </div>
            </div>
            <div class='modal-footer'>

            <a  class='modal-action modal-close waves-effect waves-green btn-flat '>Salir</a>
            
            </div>
          </div>
</div>

        <div class='row'>
                    <ul>
                        <li>
                            <div class='col s4 m4 l4'>
                                <div class='center promo promo-example'>
                                  <i class="medium material-icons orange600">videogame_asset</i>
                                 
                                  <p class='promo-caption center '><h5 style="color:#b70005">Juegos</h5></p>
                                  <p class='light center text-lighten-2' style="color:#0082aa">Contamos con una amplia sala de juegos para todo tipo de público.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class='col s4 m4 l4'>
                                <div class='center promo promo-example'>
                                   <img class="responsive-img" src="../img/logo.png" width="25%">
                                  <p class='promo-caption center teal-text text-lighten-2'><h5 style="color:#b70005">Bowling</h5></p>
                                  <p class='light center text-lighten-2' style="color:#0082aa">Somos los únicos en el país en ofrecerte la diversión del Bowling.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class='col s4 m4 l4'>
                                <div class='center promo promo-example'>
                                  <i class='medium material-icons orange600'>restaurant</i>
                                  <p class='promo-caption center teal-text text-lighten-2'><h5 style="color:#b70005">Restaurante</h5></p>
                                  <p class='light center text-lighten-2' style="color:#0082aa">Contamos con amplia variedad de platillos para saciar tu hambre y al mejor precio.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

        <br><br>

      </div>
    </div>
    <div class='parallax'><img src='../img/parallax.jpg' alt='Unsplashed background img 1'></div>
  </div>



</section>

<?php
Page::footer();
?>