<?php
namespace Rudak\FDG;

class FakeText
{

    public static function char($size = 20, $numeric = false, $randomUpper = false)
    {
        $str = '';
        while (strlen($str) < $size) {
            $str .= self::getCharacters($numeric);
        }
        $str = substr(str_shuffle($str), 0, $size);
        if (true == $randomUpper) {
            $letters = str_split($str);
            $str     = '';
            foreach ($letters as $letter) {
                $str .= rand(0, 1) ? strtoupper($letter) : $letter;
            }
        }
        return $str;

    }

    private static function getCharacters($num = false)
    {
        $alpha   = str_repeat('abcdefghijklmnopqrstuvwxz', 10);
        $numeric = str_repeat('0123456789', 10);

        return $num ? $numeric . $alpha : $alpha;
    }
}