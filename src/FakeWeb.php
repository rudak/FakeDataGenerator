<?php
namespace Rudak\FDG;

class FakeWeb
{

    const TYPE_NAME     = 'name';
    const TYPE_LASTNAME = 'lastname';
    const TYPE_STR      = 'randStr';

    public static function getFakeEmail()
    {
        $outstring = '';
        $alphabet  = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789');
        $formats   = Probability::multiple([
            '0-25'   => [self::TYPE_NAME, self::TYPE_LASTNAME, self::TYPE_STR],
            '26-70'  => [self::TYPE_NAME, self::TYPE_LASTNAME],
            '71-85'  => [self::TYPE_NAME, self::TYPE_STR],
            '86-95'  => [self::TYPE_LASTNAME, self::TYPE_STR],
            '86-95'  => [self::TYPE_LASTNAME, self::TYPE_NAME],
            '96-100' => [self::TYPE_LASTNAME],
        ]);

        foreach ($formats as $type) {
            $outstring .= ($type == self::TYPE_NAME) ? FakeUser::getFirstName(false) . '.' : null;
            $outstring .= ($type == self::TYPE_LASTNAME) ? FakeUser::getLastName(false) . '.' : null;
            if ($type == self::TYPE_STR) {
                $outstring .= str_shuffle(substr($alphabet, 0, mt_rand(2, 5)));
            }
        }
        return trim($outstring, '.') . '@' . self::getUrl(false);
    }

    public static function getUrl($full = false)
    {
        $ndd = self::getNddList();
        $ext = self::getExtList();
        if ($full) {
            $prefix   = mt_rand(0, 1) ? 'www.' : null;
            $protocol = mt_rand(0, 1) ? 'http' : 'https';
            return $protocol . '://' . $prefix . $ndd[array_rand($ndd)] . '.' . $ext[array_rand($ext)];
        } else {
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
            'rudak',
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