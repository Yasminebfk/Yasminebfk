<?php 
session_start();

    include("inc/connection.php");
    include("inc/functions.php");

    $user_data = check_login($con);
//Include required PHPMailer files
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';
//Define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
            
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
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("l").hide();
  
  $("#hide").click(function(){
    $("l").hide();
  });
  $("#hide2").click(function(){
    $("l").hide();
  });
  $("#show").click(function(){
    $("l").show();
  });
});
</script>
<?php include('inc/header2.php'); ?>
</head>
<body style=background-color:#f5f8f9;>
  

    <?php 

          $recherche = isset($_GET['message_id']) ? $_GET['message_id'] : '';
 
          $bdd =new PDO("mysql:host=localhost;dbname=u617890410_tuto;charset=utf8","u617890410_root","Zakaria2");

          $requete = $bdd->query("SELECT * FROM message where message_id = '$recherche'");

          $resultat =$requete->fetch();
        


if($_SERVER["REQUEST_METHOD"] == "POST"){

        //something was posted
         if ($_POST['choice']=='autre') 
        {if(!empty($_POST['time']) && !empty($_POST['lieu']) && !empty($_POST['date']) )
          {
          $lemessage = 'En réponse à votre message: " '.$resultat['message'].' "<br> <strong> Une autre date et lieu </strong>'.' on pourrai se rencontrer le '. $_POST['date'].' à '.$_POST['time'].' h '.' à '.$_POST['lieu'];
        $rdv_date=$_POST['date'];
        }
          else {
            echo '<div class="container"> <div class="alert alert-danger" role="alert">
            veuillez remplir les informations nécessaire<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button></div> </div>';
              die;
          }
        }
        else{
          $lemessage = 'En réponse à votre message: " '.$resultat['message'].' "<br> <strong>'.$_POST['choice'].'</strong>'; 
          $rdv_date=$resultat['rdv_date'];}
        $post_id = $resultat['post_id'];
        $id_des=$resultat['id_exp'];
        $name_des=$resultat['name_exp'];
        $email_des=$resultat['email_exp'];
        $id_exp=$_SESSION['user_id'];
        $name_exp=$_SESSION['fname'];
        $email_exp=$resultat['email_des'];
        

 
       

            //save to database

           $message_id = random_num(20);
           $query = "INSERT INTO `message`(`message_id`,`post_id`, `name_des`, `id_des`,`email_des`, `name_exp`, `id_exp`,`email_exp`, `message`,`rdv_date`) VALUES ('$message_id','$post_id','$name_des','$id_des','$email_des','$name_exp','$id_exp','$email_exp','$lemessage','$rdv_date') ";

            mysqli_query($con, $query);

              //Create instance of PHPMailer
                                
           ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "hassanbfk@cadee-coop.com";
    $to = $email_des;
    $subject = "Nouvelle reponse de $name_exp  ";
    $message =  " Bonjour  $name_des  vous a avez un nouveau message de  $name_exp pour votre livre(s) 
       -- $lemessage --
    Suivez ce lien pour repondre http://elibrarymaroc.com/read.php 
  Elibrarymaroc"  ;

    $headers = "De :" . $from;
    mail($to,$subject,$message, $headers);

    echo '<div class="container"> <div class="alert alert-success" role="alert">
Votre message a été envoyé avec succes    <a href="sent.php" class="alert-link">Messages envoyés</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> </div>' ;
    

         if ($_POST['choice']=='Daccord parfait') 
        {
          $query = "UPDATE `post` SET `en`='waiting',`sell_date`='$rdv_date' WHERE post_id='$resultat[post_id]'";

          mysqli_query($con, $query);
}

            }
?>


    <title>Repondre</title>

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
        color: black;
        background-color: lightblue;
        border: none;
    }

    #box{

        background-color: lightgrey;
        margin: auto;
        width: 500px;
        padding: 20px;
    }
    #body{

        background-color:#dff7f9;
        
    }

    </style>



    <div class="container" class="text-center">
  <div class="row">
    <div class="col"></div>
    <div class="col-12 col-lg-6 p-5">
        <div class="card  border shadow p-4">
       <form  method="post" enctype="multipart/form-data">
      
        <div > <h3>A <?php echo $resultat['name_exp']?></h3></div> <br>

            <h6> En réponse à :<br> " <?php echo $resultat['message']?> "</h6> <br> 
            <div id="hide" class="radio">
          <label  ><input type="radio" value="Daccord parfait" name="choice" checked >   Daccord parfait</label>
        </div>
        <div id="show" class="radio">
          <label><input type="radio" value="autre" name="choice" >   Une autre date et lieu</label>
        </div>
 <l  > 
          <div class="row">
            <div class="col">
            <input class="form-control" type="date" name="date"><br></div>
            <div class="col">
          <input class="form-control" type="time" name="time"></div></div>
           <input placeholder="lieu dans l'établissement" class="form-control" type="text" name="lieu"><br> <br>
  </l>
           <div id="hide2" class="radio ">
          <label><input type="radio" value="Déja vendu" name="choice" > Déja vendu</label>
        </div><br>
        <div class="row">       
       <div class="col"></div>
       
       <div class="col">  
               
            <input  class="btn btn-main animated fadeInUp btn-round-full"type="submit" value= "Repondre"><br>
           </div>
            <div class="col"></div>
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