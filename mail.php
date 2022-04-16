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
  <?php include('inc/header.php'); ?>
</head>
<body style=background-color:#2E3CA1;>

<?php 


	include("inc/connection.php");
	include("inc/functions.php");

$email= $_GET['email'];

$query = "SELECT * FROM users WHERE  email ='$email'  ";
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0)
{
	foreach($query_run as $items)
	{
		$mdp = $items['password'];
		
		ini_set( 'display_errors', 1 );
		error_reporting( E_ALL );
		$from = "elibrarymaroc.com";
		$to = $email;
		$subject = "Elibrary Mot de passe oublié ";
		$message =  "Voici votre mot de passe pour elibrarymaroc.com: $mdp   "  ;
	
		$headers = "De :" . $from;
		mail($to,$subject,$message, $headers);
		echo '<div class="container"> <div class="alert alert-success" role="alert">
On vous a envoyé votre mot de passe dans votre boite mail.  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> </div>';
		die;


	}
}
else
{ echo '<div class="container"> <div class="alert alert-danger" role="alert">
Cet email n`est pas inscrit sur elibrary <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> </div>';}

  ?>
  
    
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