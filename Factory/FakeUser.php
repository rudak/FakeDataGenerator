<?php
namespace Rudak\Bundle\FakeDataGenerator\Factory;

/**
 * Created by PhpStorm.
 * User: rudak
 * Date: 15/11/2015
 * Time: 23:37
 */
class FakeUser
{

	public static function getFirstName($uppercase = true)
	{
		$list = self::getFirstNamesList();
		$name = $list[array_rand($list)];
		return $uppercase ? ucfirst($name) : $name;
	}

	public static function getLastName($uppercase = true)
	{
		$list = self::getLastNamesList();
		$name = $list[array_rand($list)];
		return $uppercase ? ucfirst($name) : $name;
	}

	private static function getLastNamesList()
	{
		return [
			'malandin', 'crocq', 'boutinon', 'giraud', 'vinet', 'taillecourt', 'chagnas', 'moreau', 'flaubert',
			'dupuis', 'raynaud', 'meriac', 'vimpere', 'viroulaud', 'vulfin', 'jounaud', 'gounard', 'lacour', 'chazaud',
			'tardieux', 'vergnaud', 'tabaries', 'soulat', 'sureau', 'souric', 'texier', 'tison', 'chabernaud', 'martin',
			'champion', 'clenet', 'cobb', 'deret', 'deschamps', 'touplin', 'peloquin', 'dufour', 'davis', 'melet',
			'gamaury', 'pousseau', 'fonseca', 'arrivet', 'laurent', 'mousnier', 'certin', 'renaud', 'barbet', 'leroy',
			'lamaison', 'coissard', 'croisin', 'vasseron', 'brousse', 'delage', 'brisard', 'lenormand',
			'lagarde', 'coulon', 'dadet', 'bonnet'
		];
	}

	private static function getFirstNamesList()
	{
		return [
			'antoine', 'eric', 'michel', 'daniel', 'franck', 'adrien', 'axel', 'clement', 'francis',
			'nicolas', 'jerome', 'victor', 'raphael', 'simon', 'teddy', 'thomas', 'christian', 'francois',
			'denis', 'patrick', 'pierre', 'bruno', 'john', 'andew', 'peter', 'vincent', 'samy', 'samuel', 'didier',
			'mickael', 'emmanuel', 'manu', 'lilian', 'yann', 'yanick', 'raymond', 'robert', 'jean pierre', 'claude',
			'jean claude', 'jean pascal', 'steven', 'bryan', 'guillaume', 'greg', 'gregoire', 'bastien', 'sebastien',
			'gael', 'antony', 'corentin', 'seb', 'julien', 'adrian', 'adrien', 'kevin', 'louis', 'valentin', 'pierre yves',
			'arnaud', 'quentin', 'lucas', 'gabriel', 'tiphaine', 'baptiste', 'charly', 'danny', 'alexandre', 'ulrich', 'florian',
			'jean', 'frederic', 'remi', 'bruce', 'romain', 'ludovic', 'nathanael', 'benjamin', 'lucas', 'maxime', 'maxence',
			'olivier', 'arthur', 'benoit', 'paul', 'etienne', 'tony'
		];
	}
}