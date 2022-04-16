<?php 
session_start();

  include("inc/connection.php");
  include("inc/functions.php");

  $user_id = $_SESSION['user_id']; 
  $user_data = check_login($con);
  $query ="UPDATE `message` SET `lu`='1' WHERE id_des ='$user_id '";

  mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">
  
  <meta name="author" content="themefisher.com">

  <title>Elibrarymaroc</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
  <?php include('inc/header2.php'); ?>
</head>

<body style="background-color: #f5f8f9";>


      <div class="container">

            
                    <div class="text-center">
                    <br><span class="h5 text-color float-center">Mes messages reçus</span><br><br>
                    </div>
                      <?php 

                      $recherche = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

                      
            
                      $bdd =new PDO("mysql:host=localhost;dbname=u617890410_tuto;charset=utf8","u617890410_root","Zakaria2");

                      $requete = $bdd->query("SELECT * FROM message where id_des = '$recherche' ORDER BY date_message DESC");



                      ?>

                    <div  class="container">

                                        <?php
                                        $i=1;
                                    while ( $resultat =$requete->fetch())
                                        {
                                        
                                        ?>                      
                                        <div class="alert alert-secondary alert-fluid" role="alert">
                                        <h4 class="alert-heading"><i class="far fa-user"></i> de : <?=$resultat['name_exp'];?></h4>
                                        <p><?php echo $resultat['message'];?><a href="respond.php?message_id=<?php echo $resultat['message_id'];?> "class="btn btn-outline-info float-right" role="button" aria-pressed="true"><i class="fas fa-reply"></i></a></p>
                                        <hr>
                                        <p class="mb-0"><i class="far fa-clock"></i> : <strong><?php echo $resultat['date_message'];?></strong>   </p>
                                      </div>
                                           
                                                    <?php   $i=$i+1; 
                                  
                                        }
                                        ?> 
                                        <div class="alert alert-secondary alert-fluid" role="alert">
                                        <h4 class="alert-heading"><i class="far fa-user"></i> de : elibrarymaroc</h4>
                                        <p>Ici vous pourrez lire vos nouveaux messages envoyés par ceux intéressés par vos livres et y repondre .<a href="acheter.php"class="btn btn-outline-info float-right" role="button" ><i class="fas fa-reply"></i></a></p>
                                        <hr>
                                        <p class="mb-0"><i class="far fa-clock"></i> : <strong>la date du message  </strong>   </p>
                                      </div>                        
                 </div>
          </div>

            <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <script src="js/contact.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
   <!--  Magnific Popup-->
    <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>

        </body>  
 </html>