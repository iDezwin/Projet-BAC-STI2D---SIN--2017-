<?php
include_once'inc/db.php';
if (isset($_POST['submit'])){
  foreach($_POST['mode'] as $mode){
    if ($mode == 1){
      echo " "?>
      <center><h3 class="alert alert-info" role="alert">	Le mode <b> manuel </b> a été sélectionné </h3></center><br>
    <?php }else{
      echo ""?>
      <center><h3 class="alert alert-info" role="alert">	Le mode <b> automatique </b> a été sélectionné </h3></center>
    <?php }
   

    $sql = "UPDATE test SET mode='$mode'";

    if ($con->query($sql) === TRUE) {
        
    } else {
        echo "Error : " . $con->error;
    }

    $con->close();
  }
}




if (isset($_POST['submit2'])){
  foreach($_POST['etat'] as $etat){
    if ($etat == 1){
      echo " "?>
      <center><h3 class="alert alert-info" role="alert">  Ouverture </h3></center><br>
    <?php }else{
      echo ""?>
      <center><h3 class="alert alert-info" role="alert">  Fermeture </h3></center>
    <?php }
   

    $sql2 = "UPDATE test SET etat='$etat'";

    if ($con->query($sql2) === TRUE) {
        
    } else {
        echo "Error : " . $con->error;
    }

    $con->close();
  }
}



?>




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



    <title>Gestion Du Portail</title>




    <!-- Bootstrap core CSS -->
   <style type="text/css">

    body { background: #f2f2f2 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */

    .def_heure_o{
        display: block;
        width: 75px;
        height: 75px;
        position: relative;
        left: 10%;
        font-size: 50px;

    }
    .point_o{
        display: block;
        font-size: 50px;
        position: relative;
        left: 35%;
        top: -15%;
    }

    .def_minute_o{
        display: block;
        width: 75px;
        height: 75px;
        position: relative;
        left: 40%;
        top: -15%;
        font-size: 50px;
    }

    .portail{
      height: 500px:;
      width: 500px;
      display: block;
    }

   </style>

 <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css1.css">
  <link rel="stylesheet" href="assets/menu.css">


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
    <script>
    function showUser(str) {
       if (str == "") {
           document.getElementById("txtHint").innerHTML = "";
           return;
       } else {
           if (window.XMLHttpRequest) {
               // code for IE7+, Firefox, Chrome, Opera, Safari
               xmlhttp = new XMLHttpRequest();
           } else {
               // code for IE6, IE5
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
           }
           xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                   document.getElementById("txtHint").innerHTML = this.responseText;
               }
           };
           xmlhttp.open("GET","getuser.php?q="+str,true);
           xmlhttp.send();
       }
    }
    </script>




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



        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
              <span class="hamb-top"></span>
              <span class="hamb-middle"></span>
              <span class="hamb-bottom"></span>
            </button>
        </div>
      </div>

      <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Régler mode d'ouverture</a></li>
  <li><a data-toggle="tab" href="#menu1">Gestion du mode manuel</a></li>
  <li><a data-toggle="tab" href="#menu2">Gestion du mode automatique</a></li>
  <li><a data-toggle="tab" href="#menu3">Horaires d'ouverture / fermeture</a></li>
</ul>




<div class="tab-content">

  <div id="home" class="tab-pane fade in active">
  <center>
      <form method="post" action="">
          <div class="checkbox">
            <label><input type="radio" value="0" name="mode[]">Mode Automatique</label>
          </div>

          <div class="checkbox">
            <label><input type="radio" value="1" name="mode[]" >Mode manuel</label>
          </div>
          <input type="submit" value="Envoyer" name="submit" />
      </form>
  </center>
  </div>




  <div id="menu1" class="tab-pane fade">
  <center>
    <div id="home" class="tab-pane fade in active">

        <form method="post" action="">
            <div class="checkbox">
              <label><input type="radio" value="0" name="etat[]">Fermeture</label>
            </div>

            <div class="checkbox">
              <label><input type="radio" value="1" name="etat[]" >Ouverture</label>
            </div>
            <input type="submit" value="Envoyer" name="submit2" />
        </form>
    </div>
    </center>


  </div>




  <div id="menu2" class="tab-pane fade">
    <center>
    <br><br>
        <a href="gestion_ouverture.php" target="#"><button type="button" class="btn btn-primary">Gestion des horaires d'ouverture</button></a>
        <a href="gestion_fermeture.php" target="#"><button type="button" class="btn btn-primary">Gestion des horaires de fermeture</button></a>
     
    </center>
  </div>

  <div id="menu3" class="tab-pane fade">
  <br><br>

<div class="jour">
        <center>
              <select class="selectpicker" name="day" onchange="showUser(this.value)">
                <option value="">Sélectionner un jour</option>
                <option value="1">Lundi</option>
                <option value="2">Mardi</option>
                <option value="3">Mercredi</option>
                <option value="4">Jeudi</option>
                <option value="5">Vendredi</option>
                <option value="6">Samedi</option>
                <option value="7">Dimanche</option>
              </select>
          </div>
        </center>

<br><br>

<center><div id="txtHint"><b>Les horaires s'afficheront ici...</b></div></center>




  </div>
</center>
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



</body></html>