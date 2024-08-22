<?php
    $title = "Accueil";
   
    require_once "inc/header.inc.php";
    require_once "inc/functions.inc.php";
?>
<br>
<main>
<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/Avatar la voie de l eau2.jpg" class="d-block w-100" alt="Image Avatar la voie de l'eau">
    </div>
    <div class="carousel-item">
      <img src="assets/img/BB4life.jpg" class="d-block w-100" alt=" Image de Bad Boys for life">
    </div>
    <div class="carousel-item">
      <img src="assets/img/extraction.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


</main>

















<?php
    require_once "inc/footer.inc.php";
?>