<?php

namespace Rudak\Bundle\FakeDataGenerator\Factory;

use Rudak\Bundle\FakeDataGenerator\Factory\Probability;

class FakeAddress
{

	public static function getPostCode()
	{
		return rand(1000, 9585) * 10;
	}

	public static function getCity()
	{
		$cities = self::getCityList();
		return ucfirst($cities[array_rand($cities)]);
	}

	public static function indicatif()
	{
		return Probability::multiple([
			'0-79'   => 'fr',
			'80-89'  => 'en',
			'90-93'  => 'it',
			'94-96'  => 'es',
			'97-100' => 'de'
		]);
	}

	public static function getAddress($secondary = false)
	{
		$noms = [
			'des merles', 'des oiseaux', 'des epices', 'des plantes', 'du muguet', 'des paquerettes',
			'des herons', 'des pinsons', 'des corbeaux', 'des peupliers', 'des fougères', 'des mouettes',
			'des platanes', 'des chataigniers', 'des erables', 'des bouchauds', 'des renards', 'paul Gruet', 'Pierre Boucher',
			'Michel Flanquin', 'Serge Pilol', 'Francois Mitterus', 'Michel Rocco', 'Francis Feuchtbach',
			'Gustave Flaurin', 'Raymond Pasteur', 'Louise Joussieux', 'Cécile Fluton', 'Nicolas Simon', 'Bryan Colson',
		];
		if (false == $secondary) {
			$numero = '';
			$types  = ['chemin', 'rue', 'allée', 'avenue', 'route', 'impasse'];
			if (rand(0, 100) < 30) {
				$numero = rand(1, 580) . ' ';
			}
			return $numero . ucfirst($types[array_rand($types)]) . ' ' . $noms[array_rand($noms)];
		} else {
			$types = ['Batiment', 'Place', 'Résidence'];
			return $types[array_rand($types)] . ' ' . $noms[array_rand($noms)];
		}
	}

	private static function getCityList()
	{
		return [
			'paris', 'bordeaux', 'toulouse', 'pau', 'carcassone', 'beziers', 'dax', 'saint-Jean de Luz', 'montmorillon', 'royan',
			'cognac', 'jarnac', 'saintes', 'nantes', 'poitiers', 'marthon', 'saint simeux', 'blaye', 'saint Palais', 'dunkerque',
			'lyon', 'grenoble', 'metz', 'moulin', 'tarbes', 'bagnères', 'luchon', 'marseille', 'reims', 'brest',
			'toulon', 'marmande', 'bourges', 'la Rochelle', 'Clermont Ferrand', 'Nimes', 'Bayonne', 'Perpignan', 'Limoges',
			'Valence', 'Annecy', 'Dijon', 'Mulhouse', 'Strasbourg', 'Nancy', 'Thionville', 'Amiens', 'rouen',
			'caen', 'douai', 'valenciennes', 'lille', 'lorient', 'rennes', 'saint Nazaire'
		];
	}
}