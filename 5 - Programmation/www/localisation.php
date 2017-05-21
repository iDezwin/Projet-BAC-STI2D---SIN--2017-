<!DOCTYPE html>
<html lang="fr"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Localisation</title>

    <!-- Bootstrap core CSS -->
   <style type="text/css">

        body { background: #f2f2f2 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */


   </style>

 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css1.css">
  <link rel="stylesheet" href="assets/menu.css">


<!-- jQuery library -->
  <script src="assets/js1.js"></script>

<!-- Latest compiled JavaScript -->
  <script src="assets/js2.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">Menu</a>
                </li>

                <li>
                    <a href="index.php">Accueil</a>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion du portail<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Gestion portail</li>
                    <li><a href="mode_portail.php">Gestion globale</a></li>
                    <li><a href="gestion_ouverture.php">Régler heures d'ouvertures</a></li>
                    <li><a href="gestion_fermeture.php">Régler heures de fermetures</a></li>
                  </ul>
                </li>

                <li>
                    <a href="camera.php">Gestion des caméras</a>
                </li>

                <li>
                    <a href="localisation.php">Localisation du Parc</a>
                </li>

            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
        <!-- /#sidebar-wrapper -->

        


        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
          <span class="hamb-middle"></span>
          <span class="hamb-bottom"></span>
            </button>



        <!-- /#page-content-wrapper -->
<div id="map" style="width:100%;
height:calc(100vh - 70px);
background: #f2f2f2 /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
" z-index:1;>
</div>


    </div>
    <!-- /#wrapper -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Starter%20Template%20for%20Bootstrap_fichiers/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Starter%20Template%20for%20Bootstrap_fichiers/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Starter%20Template%20for%20Bootstrap_fichiers/ie10-viewport-bug-workaround.js"></script>
  
    <script type="text/javascript">
        $(document).ready(function () {
          var trigger = $('.hamburger'),
              overlay = $('.overlay'),
             isClosed = false;

            trigger.click(function () {
              hamburger_cross();      
            });

            function hamburger_cross() {

              if (isClosed == true) {          
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
              } else {   
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
              }
          }
          
          $('[data-toggle="offcanvas"]').click(function () {
                $('#wrapper').toggleClass('toggled');
          });  
        });

    </script>
	
	<script>
		function myMap() {
			var mapOptions = {
				center: new google.maps.LatLng(48.288395, 4.090067),
				zoom: 19,
				mapTypeId: google.maps.MapTypeId.HYBRID
			}
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1kbM8sxVWOlK4fJ5qS3rObZHjjVc2nNw&callback=myMap"></script>
</body></html>