<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
<!-- index.php -->

<!-- Header -->



<!-- // connexion.php

// Vérifie si l'utilisateur est connecté
// if (($statut['connected'])) {
//   $connected = true;
//   $adresse_mail = $_SESSION[''];
// } else {
//   $connected = false;
// }

//  -->
<?php
$statut = 'connecté';
?>
  
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img class="w-25 img-fluid" src="../cours_Sahar/assets/img/logo.png" alt="logo php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Accueil</a>
          </li>
          <?php 
          if($statut == 'connecté'){
            ?>
            <li class="nav-item">
            <a class="nav-link" href="profil.php">Profil</a>
          </li>
          <?php 
        }else{ 
          ?>
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
          <?php 
        }
         ?>
          
        </ul>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="index.php">Mon site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse  justify-content-center" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inscription.php">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
    </ul>
  </div>
</nav>
<br><br><br><br><br><br>
<!-- Contenu central -->


<!-- Formulaire de connexion -->
<main class="container mb-5">
  <div class="row">
  <!-- <div class="bg-warning p-4 mb-5">
          
            echo '<pre>';
            var_dump($_GET);
            echo '</pre>';
          
     </div> -->
    <div class="col-md-6 text-light bg-dark offset-md-3">
      <h1 class="display-4">Connexion</h1>
      <form action='#' method='get'>
        <div class="form-group">
          <label for="email">Adresse e-mail</label>
          <input type="email" class="form-control" id="email" placeholder="Entrez votre adresse e-mail">
        </div>
        <div class="form-group">
          <label for="motdepasse">Mot de passe</label>
          <input type="password" class="form-control" id="motdepasse" placeholder="Entrez votre mot de passe">
        </div>
        
        <button type="submit" class="btn btn-primary mb-2">Se connecter</button>
      </form>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="footer  footer-expand-lg footer-dark bg-dark ">
  <div class="container ">
    <p class="text-center text-light p-5"> Mon site &copy; 2024 </p>
  </div>
</footer>

<!-- Bootstrap CSS et JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>