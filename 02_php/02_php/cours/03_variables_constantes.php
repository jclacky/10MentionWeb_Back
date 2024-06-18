<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="favicon">
    <title>Cours PHP - Les bases</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg" >
        <div class="container-fluid">
        <a class="navbar-brand" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">Introduction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="02_bases.php">Les bases</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="03_variables_constantes.php">Les variables et les constantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="04_conditions.php">Les conditions en PHP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="05_boucles.php">Les boucles en PHP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="06_inclusions.php">Les importations des fichier</a>
                </li>
            </ul>
        
        </div>
        </div>
    </nav>
    <header class="p-5 m-4 bg-light rounded-3 border">
        <section class="container py-5">
            <?php
                echo "   <h1 class=\"display-5 fw-bold\"> Les variables et les cpnstantes en HHP</h1>";
              
            ?>
        </section>

    </header>
    <main class="container-fluid px-5">
       <?php

        echo '<h2> Les variables utilisateurs / afffectation / concaténation </h2>';
        $number = 127; // On déclare une variable $number et on lui affecte la valeur 127
        echo ' Ma variable $number vaut :' . $number . '<br>'; // je concatène avec le point (.)

        // Je peux voi le type d'une variable avec la fonction prédéfini gettype()

        echo 'Le type de ma variable $number est : ' . gettype($number) . '<br>'; // ici c'est intiger 
        #############

        $double = 1.5 ;
        echo 'Ma variable $double vaut : ' . $double . '<br>';
        echo 'Le type de ma variable $double est : ' . gettype($number) . '<br>'; // ici il s'agit d'un double (nombre à virgule)

        ##########################



        $chaine = 'Une chaine de caractère entre simple quotes';
        echo 'Ma variable $chaine vaut :' . $chaine . '<br>';
        echo 'Le type de la variable $chaine est :' . gettype($chaine) . '<br>';

        ###########################


        $chaine1 = "Une chaine de caractère entre double quotes ";
        echo 'Ma variable $chaine1 vaut :' . $chaine1 . '<br>';
        echo 'Le type de ma variable $chaine1 est :' . gettype($chaine1) . '<br>'; // ici il s'agit d'un string

        #########################
        $chaine2 = '127';
        echo 'Ma variable $chaine2 vaut :' . $chaine2 . '<br>';
        echo 'Le type de ma variable $chaine2 est :' . gettype($chaine2) . '<br>'; // ici il s'agit d'un string

        #######################
        $chaine2 = '<une chaine de caractère entre backquotes';
        echo 'Ma variable $chaine2 vaut :' . $chaine3 . '<br>';
        echo 'Le type de ma variable $chaine3 est :' . gettype($chaine3) . '<br>'; // ici il est null (Rien ne s'a) ---- Les backquotes en PHP (https://www.php.net/manual/fr/language.operators.execution.php)

        #############################################

        $booleen  = true; // ou false // Ma navigateur associe true à 1 et false à vide qui correspond à 0
        echo 'Ma variable $boolean vaut :' . $boolean . '<br>';
        echo 'Le type de ma variable $boolean est :' . gettype($boolean) . '<br>'; //ici il s'agit d'un boolean (booléen) :  permet de savoir si qlq chose est vrai ou faux

        #################
        // concaténation, affectation, et affectation combinées avec l'opérateur ".=" pour les chaines de caractères

        $prenom = 'Nicolas';
        $prenom .= 'Thomas'; // On ajoute la valeur de "Thomas" à la valeur "Nicolas" SANS  la remplacer grâce à l'opérateur ".="
        //echo $prenom;

        echo '<p> Bonjour' .$prenom . '</p>';
        echo "<p> Bonjour $prenom  </p>";  // Affiche "Bonjour Nicolas Thomas" . Ici j'utilise les doubles quotes, je n'ai pas besoin de concaténer avec le point (.), dans le guillemets la variables est évaluée : c'est son contenu qui est affiché, c'est ce qu'on appelle la substitution de variable.

        #########################

        //déclarer une chaine de caractères avec qui contient des apostrophes ex : aujourd'hui 
        // échapement des apostrophes 

        $message ='aujour\hui'; //On échappe les apostrophes quand on écrit dans les simples quotes "\"
        $message = "aujourd'hui";

        // Exercice : Vous afficher Bleu-vert-Rouge en mettant le texte de chaque couleur dans des variables

        $bleu = "Bleu -";
        $vert = "Vert -";
        $rouge ="Rouge";
        echo "<p> <span> class='text-primary'>$bleu </span><span class='text-success'>$vert</span><span class='text-danger'>$rouge</span> </p> ";

        // Exercice : Créer un drapeau  français Bleu Blanc Rouge avec le mot "bleu blanc rouge" à l'interieur de chaque couleur


        // Correction
        $bleu2 = "blue";
        $blanc2 = "white";
        $rouge2 = "red";

    echo "<div class='d-flex justify-content-center bg-dark p-5 m-auto m-5 rounded' style='width: 40%;'>
              <div class='bg-primary text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $bleu2
              </div>
              <div class='bg-$blanc2 text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $blanc2
              </div>
              <div class='bg-danger text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                  $rouge2
              </div>
          </div>";


    // Opérateurs numériques
    echo '<h2 class = "mt-5"> Opérateurs numériques </h2>';
    $a =10;
    $b=3;
    echo '$a+$b =' . $a+$b  . '<br>' ; //Affiche 12
    echo '$a-$b =' . $a-$b  . '<br>' ; //Affiche 8
    echo '$a*$b =' . $a*$b  . '<br>' ; //Affiche 20
    echo '$a/$b =' . $a/$b  . '<br>' ; //Affiche 5
    echo '$a%$b =' . $a%$b  . '<br>' ; //Affiche 0

    // Les opérateurs d'affectation combiné 
        $a -=$b;
        echo $a;
        echo '<br>';

        // Il existe aussi les autres opérateurs *= ou /= ou %=

        ##############"

        // Incrementation et décrémentation
        $i = 0;
        $i++;
        echo $i;
        echo '<br>';

        $i--;
         echo $i ;
         echo '<br>';


   
    
     $age = 5;
        

    
    if ($age > 18 ){
        echo "Vous êtes majeur.";
    } else {
        echo "Vous êtes mineur.";
    }

        /**
     * Si je veux afficher les contenu d'une variable et qu'elle soit collé à une chaine de caractère; ex: je veux afficher :
     * Aujourd'hui il fait 32°c !!
     *  ici le 32 et °c sont collés pour le faire en utilisant le mécanisme de substitution des variables il faut mettre  la variable entre accolades
     */
        $degre = 32;
        $phrase = '<p> Aujourd\'hui il fait ' . $degre . '°C !! </p>';
        echo $phrase;
        $phrase2 = "<p> Aujourd'hui il fait {$degre}°C !! </p>";
        echo $phrase2;
        
        echo '<h2 class = "mt-5"> Transtypage des variables </h2>';
        $string1 = (int)'100';
        var_dump($string1); //affiche 100 avec type integer
        $string2 = (float) '12.5';
        var_dump($string2); //affiche 12.5 avec type float
        $string3 = (int)'12.5';
        var_dump($string3); //affiche 12 avec type integer

        echo '<br>';
        echo '<h2 class = "mt-5"> Constante utilisateurs </h2>';

        # Avec la fonction prédefinie define()
        define('CHAINE', 'la valeur de la constante CHAINE' );
        echo CHAINE . '<br>'; 

        define('ENTIER', 30 );
        echo "J'ai". ENTIER . 'ans';
        echo '<br>';

         echo "J'ai". ENTIER . 'ans';
         echo '<br>';
         echo gettype (ENTIER);

        //  ==>  Contante avec le mot reservé const 
         const NBR_SEMAINE = 52;
         const HEURE_HEBDOMADAIRE  = 35;
         const NBR_MOIS = 12;
        
        echo '<br>';
        //  Le nbr d'heure mensuel sous la constante Heure
        const HEURE_MENSUEL = NBR_SEMAINE * HEURE_HEBDOMADAIRE / NBR_MOIS;
        echo 'Le nbr_heure_mensuel est de ' . HEURE_MENSUEL . 'heures';
            // define( SEMAINE / MOIS * HEBDOMADAIRE);
            // define('SEMAINE', 52 );
            //  echo SEMAINE . '<br>'; 
            //  define(' HEBDOMADAIRE', 35 );
            //  echo  HEBDOMADAIRE . '<br>'; 
            //  define('  MOIS', 12 );
            //  echo   MOIS . '<br>';
            //  $phrase3 = (int) SEMAINE / MOIS * HEBDOMADAIRE;
             
            //  echo 'Le nbr_heure_mensuel est de ' . $phrase3 . 'heures';

            
         
















    

    



       ?>

        

    </main>
    <footer>
        <div class="d-flex justify-content-evenly align-items-center bg-dark text-white p-3">
            <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/langref.php">Doc PHP</a>
            <a class="nav-link" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
            <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
        </div>
    </footer>


    <!-- http://localhost/10MentionWeb_Back/02_php/cours/ -->





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC +hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>