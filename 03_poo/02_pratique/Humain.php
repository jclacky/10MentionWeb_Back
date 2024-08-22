<?php
require_once "../inc/function.inc.php";


//Getter et Setter




class Humain{

    /**
     * le  prenom de l'humain
     * 
     * @var string
     */

    private string $prenom;

     /**
     * le nom prenom de l'humain
     * 
     * @var string
     */

     private string $nom;

     /*
    Les propriétés étant 'private', il est nécessaire de passer par des méthodes 'publiques' pour pouvoir lire et écrire ces propriétés.
    On parle de Getter (lire / récupérer) et de Setter (écrire / définir) : ce sont des méthodes qui vont faire la médiation (l'intermédiaire) entre l'extérieur de la classe et ses attributs.
    
    */

    /**
     * @param string $p
     * @return void
     */

    public function setPrenom(string $p){ //par convention, on appel la fonction avec le mot tclé 'set'
       
        if(is_string($p)){ //si c'est une chaine de caractère je rentre dans la condition 

            // mot clef $this est une "pseudo-variable" , elle va être remplacée par l'objet courrament utilisé. 
            // $this  est créer automatiquement et qui représente l'insctance courante
            $this->prenom = $p; // assigne la valeur de $p à la propriété $prenom

        }
    }

    /**
     * Récupère le prenom de l'humain
     *
     * @return string
     */ 
    public function getPrenom() : string{ //par convention, on appel la fonction avec le mot tclé 'get'
            return $this->prenom ; // assigne la valeur de $p à la propriété $prenom

        }







        /**
     * @param string $p
     * @return void
     */

    public function setNom(string $p){ 
       
        if(is_string($p)){ 
            $this->nom = $p; // assigne la valeur de $p à la propriété $prenom

        }
    }
    /**
     * Récupère le prenom de l'humain
     *
     * @return string
     */ 
    public function getNom() : string{ //par convention, on appel la fonction avec le mot tclé 'get'
            return $this->nom ; // assigne la valeur de $p à la propriété $prenom

        }

    }







$personne_1 = new Humain();
// $personne_1->prenom = "Cleid"
// echo $personne_1->prenom ;// acces directe aux propriétes privées non autorisé

// Utilisation de la méthode setPrenom() pour definir le prenom de l'humain
$personne_1->setPrenom("Cleid");

// Utilisation de la méthode getPrenom() pour definir le prenom de l'humain
echo $personne_1->getPrenom() ."<br>";

$personne_1->setNom("MANIGAT");
echo $personne_1->getNom()."<br>";

// echo "<p> Bonjour je m'appelle {$personne_1->setPrenom()} {$personne_1->getNom()}</p>";








