<?php 

include_once ("inc/header.inc.php");?>
    <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1>Les boucles en PHP</h1>
            <p class="col-md-12 fs-4"> Les boucles (qu'on appelle aussi des structures itératives) sont un moyen de faire répéter plusieurs fois un même morceau de code. Une boucle est donc une répétition, comme on a pu le voir en JavaScript</p>
        </section>
    </header><!-- fin header -->
    <main class="container-fluid px-5">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>La boucle while</h2>
                <p>
                    La boucle while est comme en JS une boucle qui permet d'éxécuter un code TANT QUE la condition d'entrée est toujours remplie
                </p>
                <?php
                $a = 0;// Initialisation de la variables à 0 => valeur de depart de la boucle
                while ($a <5) { // on boucle tant que $a est strictement inférieur à 
                    echo "<p> Tour n° $a </a>"; // On affiche à quel tour on se trouve
                    $a++; // On incrément la valeur de la variable pour que la condition d'entrée devienne false à un moment donné  
                }




                // Exercice 
                // A l'aide d'un boucle while, vous affichez les années de 1920 à 2023 dans un menu deroulant. 
             
                
                // $annee = 1920;
                // while ($annee <= 2023) {
                //     echo "<option value='$annee'>$annee</option>";
                //     $annee++;
                // }
                ?>
                <br><br>
            <div class="col-sm-12 col-md-6">
                <h2>La boucle do while</h2>
                <p>cete boucle fonctionne avec la même instruction que la boucle <span>while</span>. Ce pendant ppour cette boucle, la condition est testée à la fin et pas au début</p>
                <p>La boucle do while a la particularité de s'exécuter au mois une fois puis tant que la condition de fin est vraie</p>

                <?php

                $i = 0; // déclaration et initialisation de la variable : valeur de départ
                    do { // ici on exécute d'abord cette première partie avant même de regarder la condition
                        $i++; // j'incrémente // 1
                        echo "<p>$i</P>"; // j'affiche la valeur de $i

                    }while($i > 100); // je donne la condition, si elle a déjà été rempli, mon scipt à cet endroit, sinon la boucle recommence jusqu'à ce que la condition soit remplie.
                ?>
            </div>
            <div class="col-sm-12 col-md-6">
            <h2>La boucle for</h2>
            <p>La boucle for, comme toutes les boucles sert répéter un morceau de code tant que la condition n'est pas respectée. Sa structure es cependant différente </p>
            <ol>
                <li><span>Initialisation de la variable</span></li>
                <li><span>Condition de sortie</span></li>
                <li><span>Incrémentation de la variable</span></li>
            </ol>
            <?php
                for ($i=0; $i <15 ; $i++) { // je lance ma boucle for avec les options citées au dessus 
                    echo "<p>Tour n° $i</p>"; // Dans les accolades, je précise le code à répéter
                }

                // Exercice : Créer en php un formulaire de selection de date de naissance (jour - mois - année)

                echo "<form action='#' method='post'>
                    <label for='jour'>Jour de naissance :</label>
                    <select name='jour' >";
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value='$i'>$i</option>";
                            }
                echo"</select>";

                echo "<form action='#' method='post'>
                <label for='mois'> Mois de naissance :</label>
                <select name='mois' >";
                    for ($j = 1; $j <=12 ; $j++) {
                        echo "<option value='$j'>$j</option>";
                        }
             echo"</select>";
             echo "<form action='#' method='post'>
                <label for='annee'> annee de naissance :</label>
                <select name='annee' >";
                    for ($k = 1920; $k <=2024 ; $k++) {
                        echo "<option value='$k'>$ks</option>";
                        }
             echo"</select>";
                
            //  Exercice : Créer un tableau qui affiche 0 à 9 sur une seule ligne avec comme titre de colonne "Colonne numéro"
                
                echo "<table class=\"table table-bordered mt-5\">
                <tr>";
                for ($i = 1; $i <= 10; $i++) {
                    echo "<td>Colonne numéro $i </td>";
                }
                echo      "</tr>
                <tr>";
                for ($i = 0; $i < 10; $i++) {
                    echo "<td> $i </td>";
                }
                echo     "</tr>
                </table>";


                    
            ?>

        <div class="col-sm-12 col-md-6 mt-5">
            <h2>La boucle foreach</h2>
            <p>La boucle foreach sert à parcourir un tableau (array() ou []). On verra cette boucle plus en détails dans la page dédiée aux array(). </p>

            <p class="alert alert-danger">Attention. Lorsque que vous faites une boucle, vérifiez votre condition de sortie ainsi que l'incrémentation de votre variable. Sans incrémentation, vous aurez une boucle infinie.</p>

            <p class="alert alert-secondary">A force d'utilier les boucles, il sera de plus en plus logique de choisir telle ou telle boucle pour tel ou tel usage. </p>
        </div>



            <br>
            
            <!-- <form action="#" method="post">
                <label for="jour">Jour :</label>
                <select name="jour">
                    
                    for ($i = 1; $i <= 31; $i++) {
                    echo "<option value='$i'>$i</option>";
                    }
                    
                </select>

            <label for="mois">Mois :</label>
            <select name="mois">
                
                $mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
                for ($i = 0; $i < count($mois); $i++) {
                echo "<option value='".($i+1)."'>$mois[$i]</option>";
                }
        
            </select>
            <label for="annee">Année :</label>
                <select name="annee">
                   //
                    $annee = 1920;
                    while ($annee <= 2023) {
                    echo "<option value='$annee'>$annee</option>";
                    $annee++;
                    }
                
                </select>

            <input type="submit" value="Envoyer">
            </form> -->

            <!--  -->










            
            </div>







                
                
               
            </div>

        </div>


<?php include_once ("inc/footer.inc.php");?>