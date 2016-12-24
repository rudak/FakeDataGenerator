<?php
namespace Rudak\FDG;

class FakeBank
{

    /**
     * @return mixed le nom d'une banque
     */
    public static function bank()
    {
        $banks = self::bankList();

        return $banks[array_rand($banks)];
    }

    private static function bankList()
    {
        return [
            'BNP Paribas', 'Crédit agricole', 'Société générale', 'Unibank', 'EastWestBank', 'US Bank',
            'Goldman Sachs', 'Deutsche Bank', 'Banques Populaires', 'Caisses d’Epargne', 'Alpha Bank',
            'Crédit mutuel-CIC', 'BPCE',
        ];
    }

    /**
     * Renvoie une chaine au format IBAN
     * @return string
     */
    public static function iban()
    {
        return 'FR' . sprintf('%02d', rand(2, 98)) . strtoupper(self::randStr(23));
    }

    private static function randStr($size)
    {
        if ($size > 36) $size = 36;

        return substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $size);
    }

    /**
     * @return string renvoie une chaine au format BIC
     */
    public static function bic()
    {
        return strtoupper(self::randStr(4)) . 'FR' . strtoupper(self::randStr(5));
    }

    public static function rib()
    {
        return rand(10000, 99999) . ' ' . strtoupper(self::randStr(5)) . ' ' . strtoupper(self::randStr(11)) . ' ' . rand(10, 99);
    }

    /**
     * Renvoie une chaine aléatoire de 8 a 16 caracteres UPPERCASE représentant le format d'un numero de comte bancaire
     * @return mixed
     */
    public static function Account()
    {
        return strtoupper(self::randStr(rand(8, 16)));;
    }
}