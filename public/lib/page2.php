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

		<!--Inicio del slider-->
		<div>
			
    		

    							<!--Inicio del menú-->
						
							<nav class='menu'>
    							<div class='nav-wrapper'>
      							<a href='#' class='brand-logo center' id='name'>Galaxy Bowling</a>
      							
      							<ul id='nav-mobile' class='left hide-on-med-and-down'>
        							<li><a href='#'><i class='material-icons left'>home</i>Nuevo</a></li>
        							<li><a href='#'><i class='material-icons left'>camera</i>Multimedia</a></li>
       	 							<li><a href='../pages/store.php'><i class='material-icons left'>shopping_cart</i>Tienda</a></li>
      							</ul>
      							<ul id='nav-mobile' class='right hide-on-med-and-down'>
      								<li class='fb-like' data-href='https://www.facebook.com/galaxybowlingsv/?fref=ts' data-layout='button_count' data-action='like' data-show-faces='true' data-share='true'>
									</li>
      								
      								<li><a href='../admin/index.php' class='material-icons right'><i class='material-icons left'>account_circle</i></a></li>
      							</ul>
      							</div>
    							
  							</nav>
							<!--Fin del menú-->

  			</div>		
	
		<!--Fin del slider-->
	</header>
		";
	  	print($header);
  		
  		
	}

	public static function footer()
	{
		$footer = "

      <section id='seccion-cinco'>
    <div class='parallax-container'>
      <div class='parallax'><img src='../img/parallax5.jpg'></div>
      </div>


      <div class='section white'>
      <div class='row container'>
          <div class='row'>

            <div class='col s12'>
              <h3><a href='#'><i class='medium material-icons left'>comment</i>Comenta en nuestro Facebook.</a></h3>
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
   <footer class='page-footer'>
          <div class='container'>
            <div class='row'>
              <div class='col l6 s12'>
                <h5 class='white-text'>Galaxy bowling</h5>
                <p class='grey-text text-lighten-4'>Empresa comprometida con la diversión de nuestros clientes.</p>
                <h6 class='white-text'>Dirección</h5>
                <p class='grey-text text-lighten-4'>75 Avenida norte y paseo general escalón.</p>
                <h6 class='white-text'>Teléfono</h5>
                <p class='grey-text text-lighten-4'>2511 8900</p>
              </div>
              <div class='col l4 offset-l2 s12'>
                <h5 class='white-text'>Otras redes sociales!</h5>
                <ul>
                  <li><a class='grey-text text-lighten-3' href='https://www.facebook.com/galaxybowlingsv/?fref=ts'>Facebook</a></li>
                  <li><a class='grey-text text-lighten-3' href='#!'>Twitter</a></li>
                  <li><a class='grey-text text-lighten-3' href='https://www.instagram.com/galaxybowling/'>Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class='footer-copyright'>
            <div class='container'>
            © 2016 Copyright 
            <a class='grey-text text-lighten-4 right' href='www.galaxyfunplaza.com'>www.galaxyfunplaza.com</a>
            </div>
          </div>
        </footer>
     <!--Fin del footer-->




  <script>
    $(document).ready(function () {
       $('.modal-trigger').leanModal();
      $('.slider').slider({full_width: true});
      $('.slider').slider({height:562.5});
      $('.parallax').parallax();
      //Scroll
      $('section').scrollSpy();
      $('.dropdown-button').dropdown({hover:true});
      $('.button-collapse').sideNav();
      $('.carousel').carousel();
      $('.materialboxed').materialbox();

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