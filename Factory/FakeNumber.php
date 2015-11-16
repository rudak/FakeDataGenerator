<?php
/**
 * Created by PhpStorm.
 * User: rudak
 * Date: 16/11/2015
 * Time: 20:26
 */

namespace Rudak\Bundle\FakeDataGenerator\Factory;


class FakeNumber
{

	public static function phone()
	{
		return sprintf('%02d', rand(1, 5)) . self::formated() . self::formated() . self::formated() . self::formated();
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

	private static function formated($min = 0, $max = 99, $size = 2)
	{
		return sprintf('%0' . $size . 'd', rand($min, $max));
	}
}