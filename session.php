<?php

session_start();

if (isset($_SESSION['login'])){
    
    if (date("H")<18){
        $bienvenue="Bonjour ".$_SESSION['login']." et bienvenue dans votre espace personnel";

    }else
    {
        $bienvenue="Bonsoir ".$_SESSION['login']." et bienvenue dans votre espace personnel";
    }
    
} else {
    header('location:login.php');
    exit();       
  }    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <header>
    <div id='banniere'>
      <nav>
      <ul>
        <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span>Logged out</a></li>
        <li><a href="#">menu2</a></li>
        <li><a href="#">menu3</a></li>
      </ul>
      </nav>
    </div>
    <hr>
  </header>


  <h1><?php echo $bienvenue?></h1>
<!--  Si le visiteur clique sur se déconnecter, il est automatique envoyé vers deconnexion.php
 La page deconnexion.php est appelée page tunnel. Elle n'est pas destinée à être affichée, mais à faire un traitement
 et rediriger le navigateur vers une autre page sans que l'internaute ne s'en aperçoive.
-->
<!--  [ <a href="deconnexion.php">Se deconnecter</a>]-->
 </body>
</html>