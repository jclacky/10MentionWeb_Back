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

  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inscription.php">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>;
    
    </ul>
  </div>
</nav>
<br><br><br><br><br><br>
<!-- Contenu central -->
<main class="container p-5">
  <!-- <div class="text-light bg-dark jumbotron ">
    <div class="container">
        <h1>IOS 17</h1>
        <p>iOS 17 est la 17e version majeure du système d'exploitation mobile iOS développé par Apple pour sa gamme d'iPhone et le successeur d'iOS 16.</p>
        <table class="table table-striped">
            <tr>
                <td>
                    <img src="img/iphoneX2.jpg" alt="iPhone X" class="img-fluid mx-auto d-block w-2">
                    <button class="btn btn-primary btn-block">iPhone X</button>
                </td>
                <td>
                    <img src="img/iphoneX2.jpg" alt="iPhone 11" class="img-fluid mx-auto d-block">
                    <button class="btn btn-primary btn-block">iPhone 11</button>
                </td>
                <td>
                    <img src="img/iphoneX2.jpg" alt="iPhone 12" class="img-fluid mx-auto d-block">
                    <button class="btn btn-primary btn-block">iPhone 12</button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="img/iphoneX2.jpg" alt="iPhone 13" class="img-fluid mx-auto d-block">
                    <button class="btn btn-primary btn-block">iPhone 13</button>
                </td>
                <td>
                    <img src="img/iphoneX2.jpg" alt="iPhone 14" class="img-fluid mx-auto d-block">
                    <button class="btn btn-primary btn-block">iPhone 14</button>
                </td>
                <td>
                    <img src="img/iphoneX2.jpg" alt="iPhone 15" class="img-fluid mx-auto d-block">
                    <button class="btn btn-primary btn-block">iPhone 15</button>
                </td>
            </tr>
        </table>
    </div>
  </div> -->


  <?php
echo "<div class='text-light bg-dark jumbotron'>";
$iphones = array(
    "X" => "img/iphoneX2.jpg",
    "11" => "img/iphoneX2.jpg",
    "12" => "img/iphoneX2.jpg",
    "13" => "img/iphoneX2.jpg",
    "14" => "img/iphoneX2.jpg",
    "15" => "img/iphoneX2.jpg"
);


echo "<h1>iOS 17</h1>";
echo "<p>La dernière version du système d'exploitation mobile d'Apple.</p>";
echo "<table class='table table-striped'>";
echo "<tr>";

foreach ($iphones as $name => $img) {
    echo "<td>";
    echo "<img src='$img' alt='$name' class='img-fluid mx-auto d-block'>";
    echo "<button class='btn btn-primary btn-block'>$name</button>";
    echo "</td>";
    if (($name == "12") || ($name == "15")) {
        echo "</tr><tr>";
    }
}

echo "</tr>";
echo "</table>";
echo "</div>"
?>
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