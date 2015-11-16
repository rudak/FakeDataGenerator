<?php

namespace Rudak\Bundle\FakeDataGenerator\Factory;


class FakeBank
{

	public static function bank()
	{
		$banks = self::bankList();
		return $banks[array_rand($banks)];
	}

	public static function iban()
	{
		return 'FR' . sprintf('%02d', rand(2, 98)) . strtoupper(self::randStr(23));
	}

	public static function bic()
	{
		return strtoupper(self::randStr(4)) . 'FR' . strtoupper(self::randStr(5));
	}

	public static function rib()
	{
		return rand(10000, 99999) . ' ' . strtoupper(self::randStr(5)) . ' ' . strtoupper(self::randStr(11)) . ' ' . rand(10, 99);
	}

	public static function Account()
	{
		return strtoupper(self::randStr(rand(8, 16)));;
	}

	private static function randStr($size)
	{
		if ($size > 36) $size = 36;
		return substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $size);
	}

	private static function bankList()
	{
		return [
			'BNP Paribas', 'Crédit agricole', 'Société générale', 'Unibank', 'EastWestBank', 'US Bank',
			'Goldman Sachs', 'Deutsche Bank', 'Banques Populaires', 'Caisses d’Epargne', 'Alpha Bank',
			'Crédit mutuel-CIC', 'BPCE'
		];
	}
}