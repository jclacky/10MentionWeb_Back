<?php
require_once "../inc/function.inc.php";

class JeuVideo{

    /**
     * Le nom du jeu 
     *
     * @var string
     */
    private string $nomDuJeu;


    /**
     * Le modèle de la console 
     *
     * @var string
     */
    private string $console;




    /**
     * Le prix du jeu 
     *
     * @var string
     */
    private string $prix;



    
    /**
     * Le constructeur de la classe 
     *
     * 
     * * Le constructeur est une méthode spéciale dans une classe, définie avec le nom __construct().
     * Elle est utilisée pour initialiser les propriétés de l'objet lors de sa création.
     * En PHP, il s'agit d'une méthode magique, ce qui signifie qu'elle est automatiquement appelée lors de l'instanciation de la classe.
     * Il est important de noter qu'une classe ne peut avoir qu'un seul constructeur en PHP.
     * 
     * 
     * @param string $n Le nom du jeu 
     * @param string $c Le  modèle de la console 
     * @param float $p  Le prix du jeu
     */
    public function __construct(string $n, string $c, float $p){
    
        
    }


    /**
     * Méthode pour obtenir le nom su jeu
     *
     * @return string
     */
    public function getNom() : string{
        return $this->nomDuJeu;
    }

      /**
     * Méthode pour obtenir le nom su jeu
     *
     * @return string
     */
    public function getConsole() : string{
        return $this->console;
    }

       /**
     * Méthode pour obtenir le prix su jeu
     *
     * @return float
     */
    public function getPrix() : float{
        return $this->prix;
    }

      /**
     * Méthode pour afficher les détails du jeu
     *
     * @return string
     */
    public function afficheDetails() : string{
        return "Jeu : {$this->nomDuJeu}, console : {$this->console}, prix : {$this->prix}£";
    }
}

//Instanciation de la classe JeuVideo avec arguments pour initialiser les propriétés 
$jeu_1 = new JeuVideo('Street Fighter 6', 'PS4', 69.99);
debug($jeu_1);

//Instanciation de la classe JeuVideo avec arguments pour initialiser les propriétés 
$jeu_2 = new JeuVideo('Diablo IV', 'PS5', 79.99);
debug($jeu_2);

echo $jeu_1->afficheDetails();
echo $jeu_2->afficheDetails();



