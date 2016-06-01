<?php
namespace Rudak\FakeDataGenerator\Factory;

class FakeText
{

    public static function char($size = 20, $numeric = false)
    {
        $str = '';
        while (strlen($str) < $size) {
            $str .= self::getCharacters($numeric);
        }

        return substr(str_shuffle($str), 0, $size);
    }

    private static function getCharacters($num = false)
    {
        $alpha   = 'abcdefghijklmnopqrstuvwxz';
        $numeric = '0123456789';

        return $num ? $numeric . $alpha : $alpha;
    }
}