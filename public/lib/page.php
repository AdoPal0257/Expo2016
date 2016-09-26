<?php
session_start();

if(!isset($_SESSION['contador'])){$_SESSION['contador'] = 0;}



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
  <link rel='stylesheet' href='../css/estilo.css'>
  <link href='../css/fonts.css' rel='stylesheet'>
  <link href='../../css/icons.css' rel='stylesheet'>
  <link type='text/css' rel='stylesheet' href='../css/materialize.min.css'  media='screen,projection'/>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
  <script src='http://code.jquery.com/jquery-latest.js'></script>
  <script type='text/javascript' src='../js/jquery.js'></script>
  <script type='text/javascript' src='../js/materialize.min.js'></script>
  <script type='text/javascript' src='../js/codigo.js'></script>
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
                    <a href='#' class='brand-logo center' id='name'><img src='../img/logo.png' width='8%'>GALAXY BOWLING</a>
                  

                    <ul  class='left hide-on-med-and-down'>
                      <li><a href='../pages/index.php'><i class='icon-home left'></i>Inicio</a></li>
                      <li><a href='../pages/multimediafrm.php'><i class='icon-film left'></i>Multimedia</a></li>
                    </ul>
                    <ul  class='right hide-on-med-and-down'>
                      <li><a href='../pages/store.php'><i class='icon-cart left'></i>Tienda</a></li>
                      <li><a href='../pages/comprar.php'><i class='icon-happy2 left'></i>Fiestas</a></li>
                      <li><a href='../pages/login.php' class='material-icons right'><i class='material-icons left'>account_circle</i></a></li>
                    </ul>

                    <ul id='slide-out' class='side-nav'>
                      <li>
                        <div class='userView'>
                          <img class='background' src='../img/parallax.jpg'>
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
                      <li><a class='subheader'>Redes sociales</a></li>
                      <li><a class='fb-like' data-href='https://www.facebook.com/galaxybowlingsv/?fref=ts' data-layout='button_count' data-action='like' data-show-faces='true' data-share='true'></a></li>
                      <li><a href='https://twitter.com/galaxybowlingsv' class='twitter-follow-button' data-show-count='true'>Follow @galaxybowlingsv</a> </li>
                    </ul>
                    <a href='#'' data-activates='slide-out' class='button-collapse'><i class='material-icons'>menu</i></a>
               



              
      
</div>
                  
                </nav>

</div>
  <!--Fin del menú-->
 
</header>

		";
	  	print($header);
  		
  		
	}

	public static function footer()
	{
		$footer = "

      <section id='seccion-cinco'>


      <div class='section white'>
      <div class='row container'>
          <div class='row'>

            <div class='col s12'>
              <h3><a href='#'><i class='medium icon-bubbles left'></i>Comenta en nuestro Facebook.</a></h3>
              <!--Inicio seccion de comentarios-->
        <section id='coments' class=''>
          <div class='uk-grid uk-container-center'>
            <div class='uk-width-1-1'>

              <div id='fb-root'></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=511885375673871';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class='fb-comments' data-href='https://www.facebook.com/galaxybowlingsv/?fref=ts' data-numposts='5'></div>
              
            </div>
          </div>
        </section>
        <!--Fin seccion de comentarios-->
            </div>
        
        </div>
      </div>
    </div>
  </section>
  
  

  <!--Fin del cuerpo-->

<!--Inicio del footer-->
   <footer class='page-footer pink darken-2'>
          <div class='container'>

            <div class='row'>

              <div class='col s2 m2 l2'>
                <ul>
                  <li><a class='fb-like' data-href='https://www.facebook.com/galaxybowlingsv/?fref=ts' data-layout='button_count' data-action='like' data-show-faces='true' data-share='true'></a></li>
                </ul>
              </div>


              <div class='col m8 l8 s8 center'>
                <h5 class='white-text'>GALAXY BOWLING</h5>
                <p class='grey-text text-lighten-4'>Única empresa para disfrutar Bowling en El Salvador.</p>
                <p class='grey-text text-lighten-4'>Dirección: 75 Avenida norte y paseo general escalón.</p>
                <p class='grey-text text-lighten-4'>Teléfono: 2511 8900</p>
                <p class='grey-text text-lighten-4'><a>Acerca de</a></p>
              </div>

              <div class='col s2 m2 l2'>
                <ul>
                  <li><a href='https://twitter.com/galaxybowlingsv' class='twitter-follow-button' data-show-count='true'>Seguir @galaxybowlingsv</a></li>
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

       $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });



      
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
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

</body>
</html>


    ";

		print($footer);
	}

	
}
?>