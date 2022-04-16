<?php 
session_start();

	include("inc/connection.php");
	include("inc/functions.php");

	$user_data = check_login($con);


  

    if($_SERVER['REQUEST_METHOD'] == "POST")
  {

    //something was posted
    $message = $_POST['message'];
    $id_exp= $_SESSION['user_id'];
    $id_des = $_SESSION['id_destinataire'] ;
    $name_expediteur= $_SESSION['fname'];
    $name_destinataire = $_SESSION['name_destinataire'] ;



    if( !empty($message))
    {


      //save to database
      $query = "INSERT INTO `chat`(`id_expediteur`, `id_destinataire`, `name_expediteur`, `name_destinataire`, `message`) VALUES ('$id_expediteur','$id_destinataire','$name_expediteur','$name_des','$message') ";

      mysqli_query($con, $query);


      header("Location: send.php");
      die;
    }else
    {
      echo  "Please enter some valid information!";
    }
  }
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


 
<div class="container" class="text-center">
  <div class="row">
    <div class="col"></div>
    <div class="col-12 p-5">
      <div class="card  border shadow p-4">
       <h2 class="text-center"> A <?php echo $_SESSION['name_destinataire'];?></h2>
       <form method="post" class="p-4">
        <div class="input-group mb-3">
        <textarea id="message"class="form-control" placeholder="tape ton message" type="text" name="message"></textarea>
        <button  type="submit" class="btn btn-main animated fadeInUp btn-square-full">Envoyer</button>
      </div>
      </form>
      </div>
    </div>
    <div class="col"></div>
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

       
    
    <script src="js/script.js"></script>

 



</body>
</html>