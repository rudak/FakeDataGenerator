<?php
/**
 * Created by PhpStorm.
 * User: rudak
 * Date: 16/11/2015
 * Time: 21:11
 */

namespace Rudak\Bundle\FakeDataGenerator\Factory;


class FakeWeb
{

	public static function getFakeEmail()
	{
		$name     = FakeUser::getFirstName(false);
		$alphabet = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789');
		$str      = substr($alphabet, 0, rand(2, 5));
		return $name . '.' . $str . '@' . self::url();
	}

	public static function url($full = false)
	{
		$ndd = self::getNddList();
		$ext = self::getExtList();
		if ($full) {
			$prefix = rand(0, 1) ? 'www.' : null;
			return 'http://' . $prefix . $ndd[array_rand($ndd)] . '.' . $ext[array_rand($ext)];
		} else {
			return $ndd[array_rand($ndd)] . '.' . $ext[array_rand($ext)];
		}
	}

	private static function getExtList()
	{
		return [
			'fr', 'org', 'com', 'en', 'biz', 'io', 'net', 'cat', 'bzh',
			'edu', 'gov', 'mil', 'dk', 'en', 'es', 'nl', 'de'
		];
	}

	private static function getNddList()
	{
		return [
			'free', 'orange', 'zuttel', 'inerbase', 'tellec', 'wanadoo', 'getzen', 'roadimpact', 'dimland',
			'guitar', 'death-metal', 'webfanzine', 'fanclub', 'riverside', 'doomsday', 'social-club',
			'asia', 'africa', 'europa', 'antartica', 'seasick', 'mondial', 'fc-johnson', 'santa-maria', 'camping'
		];
	}
}