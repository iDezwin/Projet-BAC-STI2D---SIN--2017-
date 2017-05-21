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

    <title>Caméras</title>

    <!-- Bootstrap core CSS -->
   <style type="text/css">
    body { background: #f2f2f2 !important; }
    .stream{
        width: 915px;
        height: 785px;
        border: none;
        display: block;
        overflow-y: hidden;
        overflow-x: hidden;
        overflow-wrap: hidden;
        background-color: #f2f2f2;
    }
    .container{
    	display: block;

    }

   </style>

 <!-- Latest compiled and minified CSS -->
 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css1.css">
  <link rel="stylesheet" href="assets/menu.css">
  <link rel="stylesheet" href="assets/css.css">
  <link rel="stylesheet" type="text/css" href="assets/galerie.css">
  


<!-- jQuery library -->
  <script src="assets/js1.js"></script>

<!-- Latest compiled JavaScript -->
  <script src="assets/js2.js"></script>

  <!--Script allumage-->
  <script src="assets/allumage.js"></script>

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
                <li calss="sidebar-brand">
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



        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
              <span class="hamb-top"></span>
              <span class="hamb-middle"></span>
              <span class="hamb-bottom"></span>
            </button>
        </div>
      </div>

        <!-- /#page-content-wrapper -->





                    
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

<div class="container">
    <div class="row">
      <center>
      	<iframe src="http://10.16.3.30/users/view.cgi?profile=0" alt="Flux vidéo" class="stream" scrolling="no" border="hidden"></iframe>
	  </center>	
<center>
      	<div class="videos">
      		
      		<iframe width="360" height="250" src="https://www.youtube.com/embed/QGe_pirUaZI" frameborder="0" allowfullscreen></iframe>
      		<iframe width="360" height="250" src="https://www.youtube.com/embed/xxCFxPkvnKY" frameborder="0" allowfullscreen></iframe>
      		<iframe width="360" height="250" src="https://www.youtube.com/embed/X5nkehV63Iw" frameborder="0" allowfullscreen></iframe>




      	</div>
</center>     	
      </div>




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




        $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });

});


    </script>
</body></html>