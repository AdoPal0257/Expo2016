<?php
session_start();

if(!isset($_SESSION['contador3'])){$_SESSION['contador3'] = 0;}
if(!isset($_SESSION['precio'])){$_SESSION['precio'] = 0;}
class Page
{
	public static function header($title)
	{
    $header = "
    <!DOCTYPE html>
<html>
<head>
  <title>Galaxy Bowling | Galaxy fun plaza</title>
  <meta charset='utf-8'>
  <link rel='stylesheet' href='../css/estilo2.css'>
    <link href='../../css/icons.css' rel='stylesheet'>
    <link type='text/css' rel='stylesheet' href='../css/materialize.min.css'  media='screen,projection'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
    <script src='http://code.jquery.com/jquery-latest.js'></script>
    <script type='text/javascript' src='../js/jquery.js'></script>
    <script type='text/javascript' src='../js/materialize.min.js'></script>
     <script type='text/javascript' src='../js/codi.js'></script>
  <script type='text/javascript' src='../js/materialize.js'></script
</head>

<div id='fb-root'></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = '//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=511885375673871';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

<body>
  
<header>
  <!--Inicio del menú-->  
  <div class='navbar-fixed'>
              <nav id='menu' class='menu'>
                  <div class='nav-wrapper'>
                    <a href='#' class='brand-logo center' id='name'><img src='../img/logo.png' width='8%'>Galaxy Bowling</a>
                  

                    <ul  class='left hide-on-med-and-down'>
                      <li><a href='../pages/comprar.php'><i class='material-icons left'>home</i>Comprar</a></li>
                      <li><a href='../pages/multimediafrm.php'><i class='material-icons left'>camera</i>Multimedia</a></li>
                      <li><a href='../pages/store.php'><i class='material-icons left'>shopping_cart</i>Tienda</a></li>
                       <li><a id='actualiza'>".$_SESSION['contador3'].":".$_SESSION['precio']."</a></li>
                    </ul>
                    <ul  class='right hide-on-med-and-down'>
                      <li class='fb-like' data-href='https://www.facebook.com/galaxybowlingsv/?fref=ts' data-layout='button_count' data-action='like' data-show-faces='true' data-share='true'>
                      </li>
                      <li><a href='../../admin/index.php' class='material-icons right'><i class='material-icons left'>account_circle</i></a></li>
                    </ul>

                    <ul id='slide-out' class='side-nav'>
                      <li>
                        <div class='userView'>
                          <img class='background' src='../img/all.jpg'>
                          <a href='#!user'><img class='circle' src='../img/logo.png'></a>
                          <a href='#!name'><span class='white-text name'>Galaxy Fun Plaza</span></a>
                          <a href='#!email'><span class='white-text email'>Derechos reservados</span></a>
                        </div>
                      </li>
                      <li><a href='#!'><i class='material-icons'>home</i>Nuevo</a></li>
                      <li><a href='#!'>Multimedia</a></li>
                      <li><a href='#!'><i class='material-icons'>camera</i>Multimedia</a></li>
                      <li><a href='#!'>Multimedia</a></li>
                      <li><a href='#!'><i class='material-icons'>shopping_cart</i>Tienda</a></li>
                      <li><div class='divider'></div></li>
                      <li><a class='subheader'>Subheader</a></li>
                      <li><a class='waves-effect' href='#!'>Third Link With Waves</a></li>
                    </ul>
                    <a href='#'' data-activates='slide-out' class='button-collapse'><i class='material-icons'>menu</i></a>
               
                  
                </nav>
</div>
  <!--Fin del menú-->
</header>
    ";
      print($header);
     }
 public static function footer()
  {
    $footer = " <!--Inicio del footer-->
   <footer class='page-footer pink darken-2'>
          <div class='container'>
            <div class='row'>
              <div class='col m6 l6 s12'>
                <h5 class='white-text'>Galaxy Bowling</h5>
                <p class='grey-text text-lighten-4'>Empresa comprometida con la diversión de nuestros clientes.</p>
                <p class='grey-text text-lighten-4'>Dirección: 75 Avenida norte y paseo general escalón.</p>
                <p class='grey-text text-lighten-4'>Teléfono: 2511 8900</p>
              </div>
              <div class='col l4 m4 offset-l2 s12'>
                <h5 class='white-text'>Otras redes sociales!</h5>
                <ul>
                    <li><div class='chip'><a  href='https://www.facebook.com/galaxybowlingsv/?fref=ts'><img src='../img/facebook2.png' alt='Facebook'>Facebook</a></div></li>
                    <li><div class='chip'><a  href='https://twitter.com/galaxybowlingsv' alt='Twitter'><img src='../img/twitter2.png' alt='Instagram'>Twitter</a></div></li>
                    <li><div class='chip'><a  href='https://www.instagram.com/galaxybowling/'><img src='../img/instagram2.png' alt='Instagram'>Instagram</a></div></li>
                </ul>
              </div>
            </div>
          </div>
          <div class='footer-copyright pink darken-3'>
            <div class='container'>
            © 2016 Copyright 
            <a class='grey-text text-lighten-4 right' href='www.galaxyfunplaza.com'>www.galaxyfunplaza.com</a>
            </div>
          </div>
        </footer>
<!--Fin del footer-->




  <script>
    $(document).ready(function () {
      $('.modal-trigger').leanModal( );
      $('.parallax').parallax();
       $('.chips').material_chip();
      //Scroll
      $('section').scrollSpy();
      $('.dropdown-button').dropdown({hover:true});
      $('.materialboxed').materialbox();
      $('.carousel.carousel-slider').carousel({full_width: true});
      $('.carousel').carousel();

      // Initialize collapse button
      $('.button-collapse').sideNav( );
      // Initialize collapsible (uncomment the line below if you use the dropdown variation)
     //$('.collapsible').collapsible();

    <script>
                //$('.datepicker').pickadate({ selectMonths: true,selectYears: 15 });
                        $(document).ready(function() { $('select').material_select(); });
              $(document).ready(function() { $('.button-collapse').sideNav({menuWidth: 265});});
                     
      var altura = $('.menu').offset().top;
      $(window).on('scroll', function(){
      if ( $(window).scrollTop() > altura )
      {
        $('.menu').addClass('menu-fixed');
      } else {
        $('.menu').removeClass('menu-fixed');
      }
  });
});
  </script>

</body>
</html>


    ";
    print($footer);
  }
	
}
?>