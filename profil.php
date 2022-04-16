<?php 
session_start();

	include("inc/connection.php");
	include("inc/functions.php");
	$user_data = check_login($con);


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$niveau = $_POST['niveau'];
		$user_id =$_SESSION['user_id'];
		$query ="UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`niveau`='$niveau' WHERE user_id= $user_id ";

		mysqli_query($con, $query);
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['email'] = $email;
		$_SESSION['niveau'] = $niveau;
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
  <?php include('inc/header2.php'); ?>
</head>

<body>


<br><br>
<div class="container">
	<div class="row" >

<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" >
	
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
                <i class="far fa-user fa-3x"></i>
				</div>
				<h5 class="user-name"><?php echo $_SESSION['fname'] . " " .$_SESSION['lname']?></h5>
				<h6 class="user-email"><?php echo $_SESSION['email']?></h6>
			</div>

		</div>
	</div>
</div>
</div>

<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" >
<div class="card h-100">
	<form  method="post">
	<div class="card-body" >
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Editer details</h6>
			</div>

			
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" >
				<div class="form-group">
					<label for="fullName">Prenom</label>
					<input name="fname" type="text" class="form-control" value="<?php echo $_SESSION['fname']?>" required >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label >Nom</label>
					<input name="lname" type="text" class="form-control"  value="<?php echo $_SESSION['lname']?> " required >
				</div>
			</div>
		    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email"  type="mail" class="form-control"  value="<?php echo $_SESSION['email']?>" required >
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label >Niveau</label>
					<select name="niveau"  type="text" class="form-control" required  >
					<option value="<?php echo $_SESSION['niveau']?>" defined><?php echo $_SESSION['niveau']?></option>
					<option value="tc">tc</option>
				    <option value="1ab">1ab</option>
					<option value="2ab">2ab</option>
					</select>		
				</div>
				<input  class="btn btn-main animated fadeInUp btn-round-full"  type="submit" value="S'inscrire"><br><br>
			</div>
			</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('inc/footer.php'); ?>

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