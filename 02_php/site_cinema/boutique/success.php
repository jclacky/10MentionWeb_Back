<?php
require_once "../inc/functions.inc.php";
$title = "Paiement réussi";


$date = date('Y-m-d H:i:s');
$userId = $_SESSION ['user']['id_user'];
// debug($userId);
$total =  $_GET['total'];
// debug($total);
$result = addOrder($userId, $total, $date, 1 );

$orderId = lastId();
// debug($orderId);
// exit();
if($result == true){

    if(!empty($_SESSION['panier'])){

        foreach($_SESSION['panier'] as $film){

          addOrderDetails($orderId['lastId'] ,$film['id_film'], $film['price'],$film['quantite']);
          unset($_SESSION['panier']);
        }

    }


}

require_once "../inc/header.inc.php";
?>

  <div class="w-25 m-auto  d-flex flex-column align-item-center">
      <p class="alert alert-success text-center ">Votre achat est effectué avec succès</p>
      <a href="<?=RACINE_SITE?>profil.php" class="btn text-center">Suivre ma commande </a>
  </div>


