<?php
include_once'inc/db.php';
if (isset($_POST['submit'])){
  if(!empty($_POST['heure_f'] && (!empty($_POST['minute_f'] && (!empty($_POST['day'])))))){
    $heure_f = $_POST['heure_f'];
    str_pad($heure_f, 8, '0', STR_PAD_LEFT);    
    $minute_f = str_pad($_POST['minute_f'], 2, '0', STR_PAD_LEFT);  
    $day = $_POST['day'];

    $sql = "UPDATE test SET heure_f='$heure_f', minute_f='$minute_f' WHERE id=$day";

    

    if ($con->query($sql) === TRUE) {


        echo "";?>

          <center><h3 class="alert alert-success" role="alert">  <?php print($heure_f); ?> : <?php print($minute_f); ?> a été enregistré pour le jour sélectionné </h3></center><br>

        <?php 
    } else {
        echo "Error : " . $con->error;
    }


    $con->close();
  }
  if (empty($_POST['heure_f'])){
    echo ""; ?>

      <center><h3 class="alert alert-danger" role="alert">  Veuillez remplir le champ d'heure de fermeture </h3></center><br>


  <?php 

} 
  if (empty($_POST['minute_f'])){
    echo ""; ?>

      <center><h3 class="alert alert-danger" role="alert">  Veuillez remplir le champ des minutes de fermeture </h3></center><br>
  
  <?php
}
  if (empty($_POST['day'])){
    echo ""; ?>
      <center><h3 class="alert alert-danger" role="alert">  Veuillez choisir un jour dans la liste </h3></center><br>
<?php
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
        width: 100px;
        height: 75px;
        font-size: 50px;
        text-align: center;
        margin-right: 100px;
        position: relative;
        left: 35%;
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
        width: 100px;
        height: 75px;
        font-size: 50px;
        text-align: center;
        position: relative;
        left: 50%;
        bottom: 100%;
    }
    .gestion{
      /*background-color: beige;*/
      width: 100%;
      height: 85%;
      border: 3px solid #73AD21;
    }

    .point{
        display: block;
        width: 100px;
        height: 75px;
        font-size: 50px;
        text-align: center;
        position: relative;
        left: 45%;
        bottom: 90%;
    }


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

<div class="gestion">
  <center><h3>Choisir les heures de fermeture</h3></center>
        <!-- /#page-content-wrapper -->
<form method="post" action="" name="sampleform">
        <center>
          <div class="jour">
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

<br><br>
          <div class="def_heure_o">
            <input type="number" name="heure_f" class="def_heure_o" size=1 onKeyup="autotab(this, document.sampleform.minute_f)" maxlength=2 minlength="0" min="00" max="23" placeholder="HH" >
          </div>

          
          <div class="def_minute_o">
            <input type="number" name="minute_f" size=2 onKeyup="autotab(this, document.sampleform.submit)" class="def_minute_o" maxlength=2 minlength="0" min="00" max="59" placeholder="MM">
          </div>

          <center><input type="submit" value="Enregistrer heure de fermeture" name="submit" class="btn btn-default"></center><br>

          <center>
                  <a href="gestion_ouverture.php" target="#"><button type="button" class="btn btn-primary">Gestion des horaires d'ouverture</button></a>
                  <a href="mode_portail.php" target="#"><button type="button" class="btn btn-primary">Gestion globale du portail</button></a>
          </center>

</form>


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

    <script type="text/javascript">

        function autotab(original,destination){
        if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
        destination.focus()
        }


    </script>
</body></html>
