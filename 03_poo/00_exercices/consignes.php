
<?php
//////////////////////////// Exercice 1 //////////////////////////////////////

/* 
    Créez une classe Calculatrice avec deux méthodes : additionner et diviser. 
    Vous devrez ajouter des commentaires de documentation 
    Méthode additionner :   La méthode doit retourner un int, qui est la somme des deux nombres.
    Méthode diviser : La méthode doit retourner un float si la division est possible. Si le diviseur est zéro, la méthode doit retourner false.
*/

class Calculatrice {

    /**
     * Additionne deux nombres.
     *
     * @param int $a Le premier nombre à additionner.
     * @param int $b Le deuxième nombre à additionner.
     * @return int La somme des deux nombres.
     */
    public function additionner(int $a, int $b): int
    {
        return $a + $b;
    }

    /**
     * Diviser deux nomnbres.
     *
     * @param int $a La dividende
     * @param int $b Le diviseur.
     * @return int float|bool Le quotient de la division si le diviseur est différent de zéro, false sinon.
     */
    public function diviser(int $a, int $b): int
    {
        if ($b === 0) {
            return false; // Division par zéro impossible
        } else {
            return $a / $b;
        }
    }

}
$calculatrice = new Calculatrice();
// debug($calculatrice);

$somme = $calculatrice->additionner(10, 3);
echo "La somme est : " . $somme ."<br>" ;

$resultatDivision = $calculatrice->diviser(10, 0);
if (is_float($resultatDivision)) {
    echo "Le résultat de la division est : " . $resultatDivision ;
} else {
    echo "Division par zéro impossible ";
}

//////////////////////////// Exercice 2  //////////////////////////////////////

/*
    Créez un objet $fruit_1 à partir de la classe Fruit avec les propriétés suivantes : "Fraise" pour le nom et "rouge" pour la couleur.
    Vous devrez ajouter des commentaires de documentation 
    La classe Fruit doit contenir les propriétés privées $nom et $couleur.
    La classe doit également inclure un constructeur pour initialiser ces propriétés.
    Affichez les valeurs des propriétés "Fraise" et "rouge" de l'objet $fruit_1 en utilisant un echo.
*/

class Fruit{

    /**
     * Le Nom du fruit 
     *
     * @var string
     */
    private string $nom;


    
     /**
     * La Couleur du fruit 
     *
     * @var string
     */
    private string $couleur;

    public function __construct(string $f, string $c){

    }
}