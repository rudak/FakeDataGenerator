<?php
namespace Rudak\FDG;

class Probability
{

    /**
     * Renvoie la valeur correespondant a la tranche de probabilités ou la valeur par defaut $defaultValue si jamais le
     * nombre aléatoire ne tombe pas dans une tranche de probabilité.
     * @param      $options
     * Tableau de déclaration des fourchettes de probabiltés
     * 10-30 => 'foo'
     * 31-70 => 'bar'
     * @param null $defaultValue
     * @return null
     */
    public static function multiple($options, $defaultValue = null)
    {
        $randPercent = rand(0, 100);
        foreach ($options as $probability => $value) {
            
            list($mini, $maxi) = explode("-", $probability);
            if (isset($maxi)) {
                if (($mini <= $randPercent) && ($maxi >= $randPercent)) {
                    return $value;
                } elseif ($probability === $randPercent) {
                    return $value;
                }
            }
        }

        return $defaultValue;
    }


    /**
     * Renvoie true ou false avec un pourcentage correspondant à $percent
     * @param $percent
     * @return bool
     */
    public static function success($percent)
    {
        $rand = rand(0, 100 * 10);

        return ($rand <= $percent * 10);
    }
}