<?php 
session_start();

  include("inc/connection.php");
  include("inc/functions.php");

  $user_data = check_login($con);
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

    <div >

        <div >
         <br><span class="h5 text-color">Mes posts</span><br><br>
        </div>

          <?php 

          $recherche = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
 
          $bdd =new PDO("mysql:host=localhost;dbname=u617890410_tuto;charset=utf8","u617890410_root","Zakaria2");

          $requete = $bdd->query("SELECT * FROM post where user_id = '$recherche' AND en ='sell' ORDER BY date_post DESC");
          ?>
          <div  class="container col-sm-12">
            
            <div class="row">
                      <table class="table ">
                        <thead >
                          <tr>
                          
                            <th scope="col">Titre</th>
                            <th scope="col">Prix</th>
                             <th scope="col">Details</th>
                            <th scope="col">supprimer</th>
                            

                          </tr>
                        </thead>
                           <tbody>
                         <?php
                         $i=1;
                    while ( $resultat =$requete->fetch())
                         {  if ($resultat['genre']=='pack') {
                    $paths='uploads/'.$resultat['post_id'] .'et'. $resultat['user_id'] .'.jpg';     
                         ?>
              <tr  style="background-color:#f5edf9">

                  <td class="h6 ">Pack  <?=$resultat['niveau'];?></td>
                  <td> <?php echo $resultat['prix']." DH";?></td>
                  <td><a class="btn btn-outline-info" href="details.php?postid=<?php echo $resultat['post_id'];?>"><i class="fas fa-plus"></i></a></td>
                  <td><a href="inc/delete.php?postid=<?php echo $resultat['post_id'];?>" class="btn btn-outline-danger" role="button" ><i class="fas fa-trash-alt"></i></a></td>
              </tr>
                       <?php    } else {  
                         if ($resultat['genre']=='roman')  { ?>

              <tr  style="background-color:#e5f7f9">

              <td class="h6 ">Roman <?=$resultat['titre'];?></td>
              <td> <?php echo $resultat['prix']." DH";?></td>
              <td><a class="btn btn-outline-info" href="details.php?postid=<?php echo $resultat['post_id'];?>"><i class="fas fa-plus"></i></a></td>
              <td><a href="inc/delete.php?postid=<?php echo $resultat['post_id'];?>" class="btn btn-outline-danger" role="button" ><i class="fas fa-trash-alt"></i></a></td>
              </tr>
              <?php    } else {  ?>
               <tr>

                  <td class="h6 "><?=$resultat['titre'];?></td>
                  <td> <?php echo $resultat['prix']." DH";?></td>
                  <td><a class="btn btn-outline-info" href="details.php?postid=<?php echo $resultat['post_id'];?>"><i class="fas fa-plus"></i></a></td>
                  <td><a href="inc/delete.php?postid=<?php echo $resultat['post_id'];?>" class="btn btn-outline-danger" role="button" ><i class="fas fa-trash-alt"></i></a></td>
              </tr>
                       <?php } $i=$i+1; }
                       }
                         ?> 
               <tr>

<td class="h6 ">Titre Post</td>
<td> Leurs prix</td>
<td><a class="btn btn-outline-info" href="post.php"><i class="fas fa-plus"></i></a></td>
<td><a href="post.php" class="btn btn-outline-danger" role="button" ><i class="fas fa-trash-alt"></i></a></td>
</tr>
                       </tbody>
                     </table>              

                  </div>
                </div>
                <div class="container">

<div >

    <div >
     <br><span class="h5 text-color">En cours vente</span><br><br>
    </div>

      <?php 

      $recherche = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

      $bdd =new PDO("mysql:host=localhost;dbname=u617890410_tuto;charset=utf8","u617890410_root","Zakaria2");

      $requete = $bdd->query("SELECT * FROM post where user_id = '$recherche' AND en ='waiting' ORDER BY date_post DESC");
      ?>
      <div  class="container col-sm-12">
        
        <div class="row">
                  <table class="table ">
                    <thead >
                      <tr>
                      
                        <th scope="col">Titre</th>
                        <th scope="col">Prix</th>
                         <th scope="col">Details</th>
                         <th scope="col">RDV</th>
                        
                        

                      </tr>
                    </thead>
                       <tbody>
                     <?php
                     $i=1;
                while ( $resultat =$requete->fetch())
                     {  if ($resultat['genre']=='pack') {
                $paths='uploads/'.$resultat['post_id'] .'et'. $resultat['user_id'] .'.jpg';     
                     ?>
          <tr  style="background-color:#f5edf9">

              <td class="h6 ">Pack  <?=$resultat['niveau'];?></td>
              <td> <?php echo $resultat['prix']." DH";?></td>
              <td><a class="btn btn-outline-info" href="details.php?postid=<?php echo $resultat['post_id'];?>"><i class="fas fa-plus"></i></a></td>
              <td> <?php echo $resultat['sell_date'];?></td>
          
          </tr>
                   <?php    } else {  
                     if ($resultat['genre']=='roman')  { ?>

          <tr  style="background-color:#e5f7f9">

          <td class="h6 ">Roman <?=$resultat['titre'];?></td>
          <td> <?php echo $resultat['prix']." DH";?></td>
          <td><a class="btn btn-outline-info" href="details.php?postid=<?php echo $resultat['post_id'];?>"><i class="fas fa-plus"></i></a></td>
          <td> <?php echo $resultat['sell_date'];?></td>
        
          </tr>
          <?php    } else {  ?>
           <tr>

              <td class="h6 "><?=$resultat['titre'];?></td>
              <td> <?php echo $resultat['prix']." DH";?></td>
              <td><a class="btn btn-outline-info" href="details.php?postid=<?php echo $resultat['post_id'];?>"><i class="fas fa-plus"></i></a></td>
              <td> <?php echo $resultat['sell_date'];?></td>
              
          </tr>
                   <?php } $i=$i+1; }
                   }
                     ?> 
           <tr>

<td class="h6 ">titre post </td>
<td> Leurs prix</td>
<td><a class="btn btn-outline-info" href="post.php"><i class="fas fa-plus"></i></a></td>

</tr>
                   </tbody>
                 </table>              

              </div>
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