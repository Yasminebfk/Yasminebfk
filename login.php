<?php 

session_start();

	include("inc/connection.php");
	include("inc/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "select * from users where email= '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						$_SESSION['fname'] = $user_data['fname'];
						$_SESSION['lname'] = $user_data['lname'];
						$_SESSION['email'] = $user_data['email'];
						$_SESSION['etab'] = $user_data['etablissement'];
						$_SESSION['niveau'] = $user_data['niveau'];
						


						header("Location: index2.php");
						die;
					}
				}
			}
			
			echo '<div class="container"> <div class="alert alert-danger" role="alert">
Mauvais Email ou mot de passe ! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> </div>';
		}else
		{
			echo '<div class="container"> <div class="alert alert-danger" role="alert">
			veuillez remplir les informations nécessaire<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button></div> </div>';
		}
	}

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
  <?php include('inc/header.php'); ?>
</head>
<body style=background-color:#2E3CA1;>
	


<style type="text/css">
	
	#text{

		height: 30px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 500px;
		padding: 20px;
	}
</style>


<div class="container" class="text-center">
  <div class="row">
  	<div class="col"></div>
    <div class="col-12 col-lg-6 p-5">
    	<div class="card  border shadow p-4">
		<form method="post" class="p-4">
			<div style="font-size: 20px;margin: 10px;color: black;">Se connecter</div>
			<div class="form-group">
			 
			Email
			<input type="email" id="email" name="email"  class="form-control" required ><br>
			Mot de passe	
      <div class="input-group form-group">
        <input type="password" id="pwd" name="password" class="form-control"  required>
        <button type="button" id="eye" style="color:#FFF;background-color:#D0B1DF"><i class="far fa-eye"></i></button>
      </div>
    </div>
	<div class="row">
	<div class="col-6"> </div>
	<div>
	<a style="color:grey;"class="nav-link cursor-pointer" data-toggle="modal" data-target="#oublie"  >Mot de passe oublié ?</a><br><br>
     </div>	
	</div>
 

  <div>
        <div class="row">    	
       <div class="col"></div>
       <div class="col">     	
			<input  class="btn btn-main animated fadeInUp btn-round-full" type="submit" value="Se connecter"><br><br>
		   </div>
			<div class="col"></div>
		</div>

			<a style="color:grey; text-align:left" href="signup.php" >Click pour t'inscrire</a><br><br>
			</div>
		</form>
	</div>
	</div>
	<div class="col"></div>
	</div>
</div>
 <!-- start modal -->

 <div class="modal fade" id="oublie" >
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Mot de passe oublié ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="mail.php" method="GET" class="p-6">
	  <br>
	  <div> M'envoyer mon mot de passe</div> 
	   <br>
       <input  type="email" id="email" name="email"  class="form-control" required placeholder="Votre email">
	   <br>

      </div>
	  <div class="modal-footer">
	  <input  class="btn btn-main animated fadeInUp btn-round-full" type="submit" value="envoyer">
      </div>
	  </form>
    </div>
  </div>
</div>

  <!-- end modal -->

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