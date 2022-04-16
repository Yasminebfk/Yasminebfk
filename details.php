<?php 
session_start();

	include("inc/connection.php");
	include("inc/functions.php");
	$user_data = check_login($con);


?>
<!doctype html>
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

<body>

	 

<?php 

          $recherche = isset($_GET['postid']) ? $_GET['postid'] : '';
 
          $bdd =new PDO("mysql:host=localhost;dbname=u617890410_tuto;charset=utf8","u617890410_root","Zakaria2");

          $requete = $bdd->query("SELECT * FROM post where post_id = '$recherche'");
          ?>
<div  class="container">
  
  <div class="row">

                
               <?php
           $resultat =$requete->fetch();
            if ($resultat['genre']=='pack') {
          $paths='uploads/'.$resultat['post_id'] .'et'. $resultat['user_id'] .'.jpg';     
               ?>
    <div class="col-12 p-4 ">
      <div style="background-color:#f5edf9"  class="card mb-4 mb-lg-0 border-gray shadow">
      	<div class="row " >
        <div class=" col-lg-6 p-4" >           
          <img src= '<?php 
          if (file_exists($paths))
          {
           echo $paths; }
           else{
             echo'images/about/pack.png';}?>' width="100" height="300" alt='img'  class=card-img-top > </div>
          <div class="p-4" >
<h5>Pack de <?php echo $resultat['niveau'];?></h5>
<p class="mb-2 text-muted text-uppercase small"><?php echo $resultat['date_post'];?></p>
<p><span class="mr-1"><strong><?php echo $resultat['prix'];?> DH</strong></span></p>
<hr>
<div class="table-responsive ">
  <table class="table table-sm table-borderless mb-0">
    <tbody>
      <tr>
        <th ><strong>Livres</strong></th>
        <td><?php echo $resultat['titre'];?></td>
      </tr>
      <tr>
			        <td ><strong>Niveau:</strong></td>
			        <td><?php echo $resultat['niveau'];?></td>
			      </tr>
            <tr>
			        <td ><strong>Filiere :</strong></td>
			        <td><?php echo $resultat['matiere'];?></td>
			      </tr>
			      <tr>
			        <td><strong>Etat :</strong></td>
			        <td><?php echo $resultat['etat'];?></td>
			      </tr>
    </tbody>
  </table>
</div>
<hr>
<div class="table-responsive mb-2">
  <table class="table table-lg table-borderless">
    <tbody>
      <tr>
        <td class="pb-0 "> <strong> De : <?php echo $resultat['fname'];?></strong></td>
        <td class="pb-0"><a  href="send2.php?postid=<?php echo $resultat['post_id'];?>" class="btn btn-solid-border btn-round-full" role="button" aria-pressed="true">Proposer Offre</a></td>
      </tr>

    </tbody>
  </table>
</div>
    </div>
         <?php   } 
            else { 
               if ($resultat['genre']=='roman') {
              $paths='uploads/'.$resultat['post_id'] .'et'. $resultat['user_id'] .'.jpg';     
                   ?>
        <div class="col-12 p-4 ">
          <div style="background-color:#e5f7f9"  class="card mb-4 mb-lg-0 border-gray shadow">
            <div class="row">
            <div class=" col-lg-6 p-4" >           
          <img src= '<?php 
          if (file_exists($paths))
          {
           echo $paths; }
           else{
             echo'images/about/roman.png';}?>' width="100" height="300" alt='img'  class=card-img-top > </div>
          <div class="p-4" >
<h5>Roman <?php echo $resultat['titre'];?></h5>
<p class="mb-2 text-muted text-uppercase small"><?php echo $resultat['date_post'];?></p>
<p><span class="mr-1"><strong><?php echo $resultat['prix'];?> DH</strong></span></p>
<hr>
<div class="table-responsive ">
  <table class="table table-sm table-borderless mb-0">
    <tbody>

              <tr>
			        <td ><strong>Genre:</strong></td>
			        <td><?php echo $resultat['matiere'];?></td>
			      </tr>
            <tr>
			        <td ><strong>Auteur:</strong></td>
			        <td><?php echo $resultat['niveau'];?></td>
			      </tr>
			      <tr>
			        <td><strong>Etat :</strong></td>
			        <td><?php echo $resultat['etat'];?></td>
			      </tr>
    </tbody>
  </table>
</div>
<hr>
<div class="table-responsive mb-2">
  <table class="table table-lg table-borderless">
    <tbody>
      <tr>
        <td class="pb-0 "> <strong> De : <?php echo $resultat['fname'];?></strong></td>
        <td class="pb-0"><a  href="send2.php?postid=<?php echo $resultat['post_id'];?>" class="btn btn-solid-border btn-round-full" role="button" aria-pressed="true">Proposer Offre</a></td>
      </tr>

    </tbody>
  </table>
</div>
    </div>

           
             <?php   } 
             else {
              
              $paths='uploads/'.$resultat['post_id'] .'et'. $resultat['user_id'] .'.jpg';     
               ?>
    <div class="col-12 p-4 ">
      <div class="card mb-4 mb-lg-0 border-gray shadow">
      	<div class="row">

        <div class=" col-lg-6 p-4" >           
          <img src= '<?php 
          if (file_exists($paths))
          {
           echo $paths; }
           else{
             echo'images/about/livre.png';}?>' width="100" height="300" alt='img'  class=card-img-top > </div>
          <div class="p-4" >
<h5>Livre <?php echo $resultat['titre'];?></h5>
<p class="mb-2 text-muted text-uppercase small"><?php echo $resultat['date_post'];?></p>
<p><span class="mr-1"><strong><?php echo $resultat['prix'];?> DH</strong></span></p>
<hr>
<div class="table-responsive ">
  <table class="table table-sm table-borderless mb-0">
    <tbody>

              <tr>
			        <td ><strong>Matiere:</strong></td>
			        <td><?php echo $resultat['matiere'];?></td>
			      </tr>
            <tr>
			        <td ><strong>Niveau:</strong></td>
			        <td><?php echo $resultat['niveau'];?></td>
			      </tr>
			      <tr>
			        <td><strong>Etat :</strong></td>
			        <td><?php echo $resultat['etat'];?></td>
			      </tr>
    </tbody>
  </table>
</div>
<hr>
<div class="table-responsive mb-2">
  <table class="table table-lg table-borderless">
    <tbody>
      <tr>
        <td class="pb-0 "> <strong> De : <?php echo $resultat['fname'];?></strong></td>
        <td class="pb-0"><a  href="send2.php?postid=<?php echo $resultat['post_id'];?>" class="btn btn-solid-border btn-round-full" role="button" aria-pressed="true">Proposer Offre</a></td>
      </tr>

    </tbody>
  </table>
</div>
    </div>

      </div>
    </div> <?php } 
  } ?>
   </div>
   
 </div> 

<!-- Slider Start -->
<div class="main-wrapper ">

<!-- Section Intro Start -->


<section class="section testimonial">

    <div class="row justify-content-center">
      <div class="col-lg-7 text-center">
        <div class="section-title">
         <span class="h5 text-color">Produits similaires</span>
        </div>
      </div>
    </div>

  <div class="container">
 <div class="row testimonial-wrap">

<!-- item -->
<?php 

                                    $niveau =$resultat['niveau'];
                                    $matiere = $resultat['matiere'];
                                    $etab= $_SESSION['etab'];
                                    
                                    

                                        $query = "SELECT * FROM post WHERE  etablissement ='$etab' AND en ='sell' AND niveau='$niveau' ORDER BY  date_post DESC  Limit 12";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>


   
                                 <?php  if ($items['genre']=='pack') {                   
                                                $paths='uploads/'.$items['post_id'] .'et'. $items['user_id'] .'.jpg';     
                                                                   ?>

                                              <div class="col-lg-3 col-md-4 mb-5">
                                                <div style="background-color:#f5edf9" class="card    mb-4 mb-lg-0 border-gray shadow">
                                                    <img src= '<?php 
                                                    if (file_exists($paths))
                                                    {
                                                     echo $paths; }
                                                     else{
                                                       echo'images/about/pack.png';}?>' alt="" width="100" height="200" alt='img'  class=card-img-top >

                                                            <div class="card-body">
                                                                <div  class="row">
                                                                <div class="col-6">
                                                              <h5 class="h5 ">Pack <?php echo $items['niveau'];?></h5></div>
                                                              <div class="col-6">
                                                              <h3 class="card-title "><?php echo $items['prix']." DH";?></h3></div></div>
                                                        
                                                            
                                                            <div style="background-color:#eee1f4" class="blog-item-meta py-1 px-2">
                                                                <h6 class="text-muted text-capitalize mr-3">Etat :<?php echo $items['etat'];?></h6>
                                                                <h6 class="text-muted text-capitalize mr-3">Genre :<?php echo $items['genre'];?></h6>
                                                            </div> <br>

                                                    

                                                    <a  href="details.php?postid=<?php echo $items['post_id'];?>" class="btn btn-small btn-main btn-round-full float-right" role="button" aria-pressed="true">voir details</a>
                                                    </div>
                                                    <div class="card-footer text-muted">
                                                    <?php echo $items['date_post'];?>
                                                  </div>
                                                </div>
                                        </div>

               <?php
                                            } 
                                        else { if ($items['genre']=='roman') {                   
                                          $paths='uploads/'.$items['post_id'] .'et'. $items['user_id'] .'.jpg';     
                                                             ?>

                                        <div class="col-lg-3 col-md-4 mb-5">
                                          <div style="background-color:#e5f7f9" class="card  mb-4 mb-lg-0 border-gray shadow">
                                              <img src= '<?php 
                                              if (file_exists($paths))
                                              {
                                               echo $paths; }
                                               else{
                                                 echo'images/about/roman.png';}?>' alt="" width="100" height="200" alt='img'  class=card-img-top >

                                                      <div class="card-body">
                                                          <div  class="row">
                                                          <div class="col-6">
                                                        <h5 class="h5 "><?php echo $items['titre'];?></h5></div>
                                                        <div class="col-6">
                                                        <h3 class="card-title "><?php echo $items['prix']." DH";?></h3></div></div>
                                                  
                                                      
                                                      <div style="background-color:#c2e8ed" class="blog-item-meta py-1 px-2">
                                                          <h6 class="text-muted text-capitalize mr-3">Auteur : <?php echo $items['niveau'];?></h6 >
                                                          <h6 class="text-muted text-capitalize mr-3">genre :<?php echo $items['genre'];?></h6 >
                                                      </div> <br>

                                              

                                              <a  href="details.php?postid=<?php echo $items['post_id'];?>" class="btn btn-small btn-main btn-round-full float-right" role="button" aria-pressed="true">voir details</a>
                                              </div>
                                              <div class="card-footer text-muted">
                                                    <?php echo $items['date_post'];?>
                                                  </div>
                                          </div>
                                  </div>

                                  <?php  } else {                                                                        
                                            $paths='uploads/'.$items['post_id'] .'et'. $items['user_id'] .'.jpg';     
                                                               ?>

                                          <div class="col-lg-3 col-md-4 mb-5">
                                            <div class="card mb-4 mb-lg-0 border-gray shadow">
                                                <img src= '<?php 
                                                if (file_exists($paths))
                                                {
                                                 echo $paths; }
                                                 else{
                                                   echo'images/about/livre.png';}?>' alt="" width="100" height="200" alt='img'  class=card-img-top >

                                                        <div class="card-body">
                                                            <div  class="row">
                                                            <div class="col-6">
                                                          <h5 class="card-subtitle"><?php echo $items['titre'];?></h5></div>
                                                          <div class="col-6">
                                                          <h3 class="card-title"><?php echo $items['prix']." DH";?></h3></div></div>
                                                    
                                                        
                                                        <div class="blog-item-meta bg-gray py-1 px-2">
                                                            <h6 class="text-muted text-capitalize mr-3">Matière :<?php echo $items['matiere'];?></h6>
                                                            <h6 class="text-muted text-capitalize mr-3">Niveau :<?php echo $items['niveau'];?></h6>
                                                        </div> <br>

                                                

                                                <a  href="details.php?postid=<?php echo $items['post_id'];?>" class="btn btn-small btn-main btn-round-full float-right" role="button" aria-pressed="true">voir details</a>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    <?php echo $items['date_post'];?>
                                                  </div>
                                            </div>
                                    </div>

           <?php

}  }
                                            }  }
                                ?>
<!-- item -->

</div>
  </div>
</section>



  

<!--  Section Cta End-->
<?php include('inc/footer.php'); ?>
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
   
   
