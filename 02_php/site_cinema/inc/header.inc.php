<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Premier site en PHP : site cinema">
    <meta name="author" content="Sahar ferchichi">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--  icone bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--  Line vers google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Script ppour stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="<?=RACINE_SITE?>assets/css/style.css">
    <title></title>
</head>

<body>

    <main>
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
                <h1><a class="navbar-brand" href="<?=RACINE_SITE?>index.php">M <img src="<?=RACINE_SITE?>assets/img/logo.png" alt="" > VIES</a></h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav w-100 d-flex justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="<?=RACINE_SITE?>index.php">Accueil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Catégories
                                </a>
                                <ul class="dropdown-menu">
                                    
                                        <?php
                                        $categories = allCategories();

                                     foreach($categories as $key => $categorie){



                                        ?>

<li><a class="dropdown-item" href="<?=RACINE_SITE?>index.php?id_category=<?=$categorie['id_category']?>"><?= ucfirst($categorie['name'])?></a></li>
                                        <?php
                                        
                                     

                                     }
                                        ?>
                                  
                                    
                                </ul>
                            </li>
    
                            <?php
                                if (empty($_SESSION['user'])) {
    
                            ?>
    
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=RACINE_SITE?>register.php">Inscription</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=RACINE_SITE?>authentification.php">Connexion</a>
                                </li>
    
                            <?php       
                                }else {
                            ?>
    
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=RACINE_SITE?>profil.php">Compte <sup class="badge text-bg-danger text-bg-secondary"><?=$_SESSION['user']['firstName']?></sup></a>

                                </li>
    
                                <?php
                                    if ($_SESSION['user']['role'] == 'ROLE_ADMIN') {
                                ?>
                                
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Backoffice</a>
    
                                            <ul class="dropdown-menu">
                                                 <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/categories.php">Catégories</a></li>
                                                 <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/films.php">Films</a></li>
                                                 <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/gestion_film.php">Gestion films</a></li>
                                                 <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>admin/users.php">utilisateurs</a></li>
                                                 
                                            </ul>
    
                                        </li>  
                                    
    
                            
    
                               
    
                            <?php
                                }
                            ?>
                             <li class="nav-item">
                                    <a class="nav-link" href="?action=deconnexion">Déconnexion</a>
                                </li>
                        <?php
                            }
                        ?>
                         
    
    
    
    
                         
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?=RACINE_SITE?>boutique/panier.php"><i class="bi bi-cart fs-2"> <sup class="badge text-bg-danger text-bg-secondary">  <?=
                             
                            (!empty($_SESSION['panier'])) && !empty($_SESSION['user']) ? count($_SESSION['panier']) : ''?></sup></i></a>
                            </li>
                            
                            
                        </ul>
                        
                    </div>
                </div>
            </nav>
        </header>
    