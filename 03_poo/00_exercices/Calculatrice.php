<?php
require_once "../inc/function.inc.php";


class Calculatrice
{

    /**
     * @param integer $nbr1
     * @param integer $nbr2
     * @return integer la somme des deux nombres
     */

    public function additionner(int $nbr1, int $nbr2) :int{
        return $nbr1+$nbr2;
    }

    public function diviser(float $nbr1, float $nbr2,) :mixed {
        if($nbr2 ===0){
            return "false";
        }
        return  $nbr1/$nbr2;
    }
}

$calcul = new Calculatrice();
$addition = $calcul -> additionner(10, 2);
echo $addition;
$division = $calcul->diviser(10, 0);
echo $division;
