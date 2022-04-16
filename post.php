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
<body style=background-color:#2E3CA1;>
    
    <title>Mettre en vente</title>

<style type="text/css">
    /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #c8cef7;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #96a0e0;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #505fbf;
}
/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

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


    </style>


<div class="container" class="text-center">
  <div class="row">
    <div class="col"></div>
    <div class="col-12 col-lg-6 p-5">
        <div class="card  border shadow p-4">

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Pack')" id="defaultOpen">Pack </button>
  <button class="tablinks" onclick="openCity(event, 'Livre')">Livre seul</button>
  <button class="tablinks" onclick="openCity(event, 'Roman')">Roman</button>
</div>


  
    <div id="Pack" class="tabcontent">
      
       <form action="upload.php?genre=<?php echo 'pack' ;?>" method="post" enctype="multipart/form-data">
        <div style="font-size: 20px;margin: 10px;color: black;">Pack</div>


            Niveau 
                          <select  name="niveau" class="form-control"required >
                            <option value="tc">tc</option>
                            <option value="1ab">1ab</option>
                            <option value="2ab">2ab</option>
                          </select><br>
           Filière<input type="text" name="matiere" class="form-control" required><br>
            Etat 
                          <select class="form-control"  name="etat" required>
                            <option value="nouveau">nouveau</option>
                            <option value="bien">bien</option>
                            <option value="ancien">ancien</option>
                          </select><br>
            Livres<textarea class="form-control" type="text" name="titre" placeholder="Ajoutez les livres : livre1 - livre2 - livre..." required></textarea><br>
            Prix<input placeholder="Prix générale de tout les livres" class="form-control" type="number" min="0" max="5000" name="prix" required><br>
                      
        <h4>Ajouter image</h4>
        <label for="fileUpload">Image des livres</label>
        <input  type="file" name="photo" id="fileUpload"><br><br>
       <div>
        <div class="row">       
       <div class="col"></div>
       <div class="col">        
            <input  class="btn btn-main animated fadeInUp btn-round-full"type="submit" value= "Mettre en vente"><br>
           </div>
            <div class="col"></div>
        </div>
        </div>
        <p><strong>Note:</strong> Seuls les formats .jpg, et jpeg  sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
      
      
    </div>
    <div id="Livre" class="tabcontent">
      
      
       <form action="upload.php?genre=<?php echo 'livre' ;?>" method="post" enctype="multipart/form-data">
        <div style="font-size: 20px;margin: 10px;color: black;">Livre</div>

            Titre<input class="form-control" type="text" name="titre" required><br>
            Matiere<input class="form-control" type="text" name="matiere" required><br>
            Niveau 
                          <select class="form-control" name="niveau" required>
                            <option value="tc">tc</option>
                            <option value="1ab">1ab</option>
                            <option value="2ab">2ab</option>
                          </select><br>
            Etat 
                          <select class="form-control" name="etat" required>
                            <option value="nouveau">nouveau</option>
                            <option value="bien">bien</option>
                            <option value="ancien">ancien</option>
                          </select><br>
            Prix<input placeholder="Prix du livre " class="form-control" type="number" min="0" max="5000" name="prix" required><br>
                      
        <h4>Ajouter image</h4>
        <label for="fileUpload">Image du livre</label></label>
        <input type="file" name="photo" id="fileUpload"><br>
       <div>
        <div class="row">       
       <div class="col"></div>
       <div class="col">        
            <input  class="btn btn-main animated fadeInUp btn-round-full"type="submit" value= "Mettre en vente"><br><br>
           </div>
            <div class="col"></div>
        </div>
        </div>
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg  sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
    
    </div>
    <div id="Roman" class="tabcontent">
      
      
       <form action="upload.php?genre=<?php echo 'roman' ;?>" method="post" enctype="multipart/form-data">
        <div style="font-size: 20px;margin: 10px;color: black;" >Roman</div>

            Titre<input class="form-control" type="text" name="titre" required><br>
            Auteur<input class="form-control" type="text" name="niveau" required><br>
            Genre<input class="form-control" type="text" name="matiere" required><br>
            Etat 
                          <select class="form-control" name="etat" required>
                            <option value="nouveau">nouveau</option>
                            <option value="bien">bien</option>
                            <option value="ancien">ancien</option>
                          </select><br>
            Prix<input placeholder="Prix du roman" class="form-control" type="number" min="0" max="5000" name="prix" required><br>
                      
        <h4>Ajouter image</h4>
        <label for="fileUpload">Image du livre</label></label>
        <input type="file" name="photo" id="fileUpload"><br>
       <div>
        <div class="row">       
       <div class="col"></div>
       <div class="col">        
            <input  class="btn btn-main animated fadeInUp btn-round-full"type="submit" value= "Mettre en vente"><br><br>
           </div>
            <div class="col"></div>
        </div>
        </div>
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg  sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
    
    </div>


    </div>
    </div>
   <div class="col"></div>
</div>
</div>



<!--



<div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>  -->

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

   <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
    
    <script src="js/script.js"></script>

</body>
</html>