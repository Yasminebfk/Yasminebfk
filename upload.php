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

</head>
<?php

session_start();

    include("inc/connection.php");
    include("inc/functions.php");


// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
        //something was posted
        $titre = $_POST['titre'];
        $user_id=$_SESSION['user_id'];
        $fname=$_SESSION['fname'];
        $matiere = $_POST['matiere'];
        $niveau = $_POST['niveau'];
        $etat = $_POST['etat'];
        $prix = $_POST['prix'];
        $etab = $_SESSION['etab'];
        $email = $_SESSION['email'];
        $genre = $_GET['genre'];


        if(!empty($titre) && !empty($niveau) && !empty($etat) && !empty($prix) && !empty($genre)&& !empty($matiere) )
        {
            //save to database

            $post_id = random_num(20);
            $nm_file= $post_id .'et'. $user_id . '.jpg';
            $query = "insert into post (post_id,user_id,fname,email,titre,matiere,niveau,etat,prix,etablissement,genre,en) values ('$post_id','$user_id','$fname','$email','$titre','$matiere','$niveau','$etat','$prix','$etab','$genre','sell')";

            mysqli_query($con, $query);


    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            
                move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $nm_file);
                echo "Votre fichier a été téléchargé avec succès.";
                echo $matiere = $_POST['matiere'];
        echo $niveau ;
        echo $etat.'  ' ;
        header("Location: mes_posts.php");
             
        } else{
            echo '<div class="container"> <div class="alert alert-danger" role="alert">
Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> </div>' ; 
        }
    } else{
        echo '<div class="container"> <div class="alert alert-success" role="alert">
votre demande a  été envoyé avec succés <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div> </div>' ;
   header("Location: mes_posts.php");
    }}
else{
    echo  '<div class="container"> <div class="alert alert-danger" role="alert">
    veuillez remplir les informations nécessaire<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div> </div>';
}

}
?>
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
