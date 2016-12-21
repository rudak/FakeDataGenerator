<?php
namespace Rudak\FDG;


class FakeWeb
{

    public static function getFakeEmail()
    {
        mt_srand(self::make_seed());
        $name     = FakeUser::getFirstName(false);
        $lastname = FakeUser::getLastName(false);
        $alphabet = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789');
        $str      = str_shuffle(substr($alphabet, 0, mt_rand(2, 5)));

        return $name . '.' . $lastname . '.' . $str . '@' . self::url();
    }

    public static function make_seed()
    {
        list($usec, $sec) = explode(' ', microtime());

        return (float)$sec + ((float)$usec * 100000);
    }

    public static function url($full = false)
    {
        $ndd = self::getNddList();
        $ext = self::getExtList();
        if ($full) {
            $prefix = mt_rand(0, 1) ? 'www.' : null;

            return 'http://' . $prefix . $ndd[array_rand($ndd)] . '.' . $ext[array_rand($ext)];
        }
        else {
            shuffle($ndd);
            shuffle($ext);

            return $ndd[array_rand($ndd)] . '.' . $ext[array_rand($ext)];
        }
    }

    private static function getNddList()
    {
        return [
            'free', 'orange', 'zuttel', 'inerbase', 'tellec', 'wanadoo', 'getzen', 'roadimpact', 'dimland',
            'guitar', 'death-metal', 'webfanzine', 'fanclub', 'riverside', 'doomsday', 'social-club',
            'asia', 'africa', 'europa', 'antartica', 'seasick', 'mondial', 'fc-johnson', 'santa-maria', 'camping',
            'margo', 'pinardo', 'ricassoux', 'tibox', 'yuriks', 'sepultura', 'gorgoroth', 'morogath', 'artery', 'ruru',
            'tessyx', 'doucey', 'arobiz', 'aerial-doudou', 'demoniac-bitch', 'sexy-slip', 'maybe-me', 'intergalactica',
        ];
    }

    private static function getExtList()
    {
        return [
            'fr', 'org', 'com', 'en', 'biz', 'io', 'net', 'cat', 'bzh',
            'edu', 'gov', 'mil', 'dk', 'en', 'es', 'nl', 'de', 'ab', 'cd', 'ef', 'gh', 'ij', 'kl', 'mn',
            'op', 'qr', 'st', 'uv', 'wx', 'yz',
        ];
    }
}