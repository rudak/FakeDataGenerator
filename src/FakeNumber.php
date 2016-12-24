<?php
namespace Rudak\FDG;

class FakeNumber
{

    /**
     * Renvoi d'un nombre aléatoire
     *
     * @param int $size taille du nomnbre souhaité. si le nombre est plus petit "en valeur qu'en taille" il sera complété
     *                  par la gauche avec des zéros
     * @param int $max  valeur maximum
     * @return mixed
     */
    public static function number($size = 5, $max = 99999999999)
    {
        return str_pad((int)rand(0, $max), $size, '0', STR_PAD_LEFT);
    }
    /**
     * Renvoie un numéro de telephone au format demandé
     * @return string
     */
    public static function phone()
    {
        return sprintf('%02d', rand(1, 5)) . self::formated() . self::formated() . self::formated() . self::formated();
    }

    private static function formated($min = 0, $max = 99, $size = 2)
    {
        return sprintf('%0' . $size . 'd', rand($min, $max));
    }

    /**
     * Renvoie un numéro de telephone au format demandé
     * @param string $format Format du pays demandé (FR,EN,DE,US)
     * @param bool   $spaced Rajoute un espace entre chaque numéros
     * @return string
     */
    public static function mobile($format = 'fr', $spaced = false)
    {
        $space = $spaced ? ' ' : null;
        switch (strtolower($format)) {
            case 'fr':
                return sprintf('%02d', rand(6, 7)) . $space . self::formated() . $space . self::formated() . $space . self::formated() . $space . self::formated();
                break;
        }
    }

    /**
     * Renvoie un numéro de SIREN
     * @return mixed
     */
    public static function siren()
    {
        return str_shuffle(sprintf('%09d', rand(9999, 999999)));
    }
    
    /**
     * Renvoie un numéro de SIRET
     * @return mixed
     */
    public static function siret()
    {
        return str_shuffle(sprintf('%014d', rand(9999, 999999999)));
    }
}