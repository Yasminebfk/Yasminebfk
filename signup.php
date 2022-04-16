<?php 
session_start();

	include("inc/connection.php");
	include("inc/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$etablissement = $_POST['etablissement'];
		$niveau = $_POST['niveau'];
		$password = $_POST['password'];
		$code = $_POST['code'];
		$user_id = random_num(20);
		
		if(!empty($fname) && !empty($lname) && !empty($etablissement) && !empty($niveau) && !empty($password) )
		{
			// Validate password strength
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			$specialChars = preg_match('@[^\w]@', $password);

			if(!$uppercase || !$lowercase || strlen($password) < 8 || strlen($password) > 20) {
				echo '<div class="container"> <div class="alert alert-danger" role="alert">
				Le mot de passe doit comporter au moins 8 caractères  et pas  plus de 20 et doit inclure au moins une lettre majuscule et minuscule.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button></div> </div>';
			}
			
			else{		$query = "SELECT * FROM `users` WHERE email  ='$email'";
				mysqli_query($con, $query);
				$query_run = mysqli_query($con, $query);
		
				if(mysqli_num_rows($query_run) > 0)
				{
					echo '<div class="container"> <div class="alert alert-danger" role="alert">
					email déja utilisé <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button></div> </div>';
				}
				else {
				

			//save to database
			$query = "select * from etablissement where etablissement= '$etablissement' limit 1";
			$result = mysqli_query($con, $query);
			$user_data = mysqli_fetch_assoc($result);
			if($user_data['code'] === $code)
			{

			$query ="INSERT INTO `users`(`user_id`, `fname`, `lname`, `etablissement`, `niveau`, `password`, `email`) VALUES ('$user_id','$fname','$lname','$etablissement','$niveau','$password','$email')";

			mysqli_query($con, $query);

			ini_set( 'display_errors', 1 );
			error_reporting( E_ALL );
			$from = "elibrarymaroc.com";
			$to = $email;
			$subject = "Bienvenue a Elibrarymaroc ! ";
			$message =  " Bonjour  $fname  merci de nous avoir fait confiance et rejoint l'aventure Elibrary,  vous n'allez pas le  regreter Suivez ce lien pour voir la nouveauté : http://elibrarymaroc.com/index2.php
		    Elibrarymaroc"  ;
		
			$headers = "De :" . $from;
			mail($to,$subject,$message, $headers);
			header("Location: login.php");
			die;
		}
		else
		{
			echo  '<div class="container"> <div class="alert alert-danger" role="alert">
			votre  code d`établissement est faux<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button></div> </div>';
		}
		}
		}
		}else
		{
			echo  '<div class="container"> <div class="alert alert-danger" role="alert">
			veuillez remplir les informations nécessaire<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button></div> </div>';
		}
	}
?>


<!DOCTYPE html>
<html>
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



	

<div class="container" class="text-center">
  <div class="row">
  	<div class="col"></div>
    <div class="col-12 col-lg-6 p-5">
    	<div class="card  border shadow p-4">
		<form method="post" class="p-4">
			<div style="font-size: 20px;margin: 10px;color: black;">S'inscrire</div>

			 <div class="row">
			<div class="col">
			Prénom<input type="text" name="fname" class="form-control" required><br></div>
			<div class="col">
			Nom<input  type="text" name="lname" class="form-control" required><br></div></div>
			Email<input type="email" name="email" class="form-control" required><br>
			Mot de passe	
      <div class="input-group form-group">
        <input type="password" id="pwd" name="password" class="form-control"  required>
        <button type="button" id="eye" style="color:#FFF;background-color:#D0B1DF"><i class="far fa-eye"></i></button>
      </div>
  
			Niveau 
						  <select  name="niveau" class="form-control" required>
						    <option value="tc">tc</option>
						    <option value="1ab">1ab</option>
						    <option value="2ab">2ab</option>
						  </select><br>
			Etablissement 
						  <select name="etablissement" class="form-control" required>
	                         <?php 
                                    $con = mysqli_connect("localhost","u617890410_root","Zakaria2","u617890410_tuto");

                                        $query = "SELECT etablissement FROM etablissement";
                                        $query_run = mysqli_query($con, $query);

                                            foreach($query_run as $items)
                                            {
                                                ?>
						    <option value="<?php echo $items['etablissement']?>"><?php echo $items['etablissement']?></option>
											<?php }?>
						   </select><br>
            <div>
			Code de l'ètablissement<input  type="number" name="code" class="form-control" value="111" required><br>
        <div class="row">    	
       <div class="col"></div>
       <div class="col">     	
			<input  class="btn btn-main animated fadeInUp btn-round-full" type="submit" value="S'inscrire"><br><br>
		   </div>
			<div class="col"></div>
		</div>

			<a style="color:grey;" href="login.php" >Click pour te connecter</a><br><br>
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

    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>


</body>
</html>