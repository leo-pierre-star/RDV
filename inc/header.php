<?php
require_once 'classes/conf.class.php';
require_once 'classes/connexion.class.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $titre ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="icon" href="img/logo.jpg">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/nav.css">


  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>
<body>

  <!-- Navigation -->
  <?php if (isset($_SESSION['etatConnexion'])) { ?>
    <nav class="navbar navbar-expand-lg navbar-light static-top bg-light" >



    <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span></button>
    


      <div class="collapse navbar-collapse main-menu-item justify-content-center" id="navbarSupportedContent1">
        <a class=" navstyle nav-item nav-link" href="index.php" <?php if ($nav_en_cours == 'accueil') {echo ' id="en-cours"';} ?>>Accueil <i class="fas fa-home"></i></a>
        <a class=" navstyle nav-item nav-link" href="disponibilite.php" <?php if ($nav_en_cours == 'form') {echo ' id="en-cours"';} ?>>Disponibilités <i class="far fa-calendar-alt"></i></a>
        <?php
      
        // if(!isset($_SESSION['role']) || !isset($_SESSION['etatConnexion'])) { 
        //       if ($nav_en_cours == "seco") {
        //         echo '<a class="navstyle nav-item nav-link" href="seConnecter.php" id="en-cours" >Se connecter <i class="fas fa-plug"></i></a>';
        //       }
        //       else{
        //         echo '<a class="navstyle nav-item nav-link" href="seConnecter.php" >Se connecter <i class="fas fa-plug"></i></a>';
        //       }
      
        // } else {
          
            
          
          if ($nav_en_cours == "dispo") {
            echo '<a class=" navstyle nav-item nav-link" href="listeEtudiants.php">Liste étudiants <i class="fas fa-list"></i></a>';
          }
          else{
            echo '<a class=" navstyle nav-item nav-link" href="tableaudispo.php">Liste étudiants <i class="fas fa-list"></i></a>';
          }
          
          echo '<a class=" navstyle nav-item nav-link" href="deconnexion.php" >Se déconnecter <i class="fas fa-sign-out-alt"></i></a>';
        // }
      }
    
      ?>
    