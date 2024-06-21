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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="index.php">Mon site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
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

<!-- Formulaire d'inscription -->
<main class="container mb-5">
  <div class="row  ">
     <div class="bg-warning p-4 mb-5">
          <?php
            echo '<pre>';
            var_dump($_POST);
            echo '</pre>';
          ?>
     </div>
    <div class="col-md-6 offset-md-3  text-light bg-dark">
      <h1 class="display-4">Inscription</h1>
      
        <form action='#' method='POST'>
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control"  name= "nom" id="nom" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control"  name= "prenom" id="prenom" placeholder="Entrez votre prénom">
            </div>
            <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" class="form-control"  name= "email" id="email" placeholder="Entrez votre adresse e-mail">
            </div>
            <div class="form-group">
            <label for="motdepasse">Mot de passe</label>
            <input type="password" class="form-control"  name= "motdepasse" id="motdepasse" placeholder="Entrez votre mot de passe">
            </div>
            <div class="form-group">
            <label for="confirmermotdepasse">Confirmer mot de passe</label>
            <input type="password" class="form-control"  name= "confirmermotdepasse" id="confirmermotdepasse" placeholder="Confirmez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary mb-2">S'inscrire</button>
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