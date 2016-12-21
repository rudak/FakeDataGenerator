<?php
namespace Rudak\FDG\Factory;


class FakeNumber
{

    public static function number($size = 5, $max = 999999)
    {
        return str_pad((int)rand(0, $max), $size, '0', STR_PAD_LEFT);
    }

    public static function phone()
    {
        return sprintf('%02d', rand(1, 5)) . self::formated() . self::formated() . self::formated() . self::formated();
    }

    private static function formated($min = 0, $max = 99, $size = 2)
    {
        return sprintf('%0' . $size . 'd', rand($min, $max));
    }

    public static function mobile()
    {
        return sprintf('%02d', rand(6, 7)) . self::formated() . self::formated() . self::formated() . self::formated();
    }

    public static function siren()
    {
        return str_shuffle(sprintf('%09d', rand(9999, 999999)));
    }

    public static function siret()
    {
        return str_shuffle(sprintf('%014d', rand(9999, 999999999)));
    }
}