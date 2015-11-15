<?php
/**
 * Created by PhpStorm.
 * User: rudak
 * Date: 16/11/2015
 * Time: 00:18
 */

namespace Rudak\Bundle\FakeDataGenerator\Factory;

use Rudak\Bundle\FakeDataGenerator\Factory\FakeUser;

class FakeEmail
{

	public static function getFakeEmail()
	{
		$name     = FakeUser::getFirstName(false);
		$alphabet = str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789');
		$str      = substr($alphabet, 0, rand(2, 5));
		$ndd      = self::getNddList();
		$ext      = self::getExtList();
		return $name . '.' . $str . '@' . $ndd[array_rand($ndd)] . '.' . $ext[array_rand($ext)];
	}

	private static function getExtList()
	{
		return ['fr', 'org', 'com', 'en', 'biz', 'io'];
	}

	private static function getNddList()
	{
		return ['free', 'orange', 'zuttel', 'inerbase', 'tellec', 'wanadoo', 'getzen', 'roadimpact', 'dimland'];
	}
}
