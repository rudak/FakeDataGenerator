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

    public static function make_seed()
    {
        list($usec, $sec) = explode(' ', microtime());
        return (float)$sec + ((float)$usec * 100000);
    }


    public static function getFirstName($uppercase = true)
    {
        $list = self::getFirstNamesList();
        $name = $list[array_rand($list)];
        return $uppercase ? ucfirst($name) : $name;
    }

    public static function getLastName($uppercase = true)
    {
        $list = self::getLastNamesList();
        shuffle($list);
        $name = $list[array_rand($list)];
        return $uppercase ? ucfirst($name) : $name;
    }


    public static function getPseudo($nb = 3, $uppercase = true)
    {
        mt_srand(self::make_seed());
        $list = self::getSyllabes();
        $pseudo = '';
        for ($i = 0; $i < $nb; $i++) {
            shuffle($list);
            $pseudo .= $list[array_rand($list)];
        }
        $pseudo .= Probability::success(80) ? mt_rand(10, 99) : null;
        return $uppercase ? ucfirst($pseudo) : $pseudo;

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
            'mickael', 'emmanuel', 'manu', 'lilian', 'yann', 'yanick', 'raymond', 'robert', 'jeanpierre', 'claude',
            'jean claude', 'jean pascal', 'steven', 'bryan', 'guillaume', 'greg', 'gregoire', 'bastien', 'sebastien',
            'gael', 'antony', 'corentin', 'seb', 'julien', 'adrian', 'adrien', 'kevin', 'louis', 'valentin', 'pierreyves',
            'arnaud', 'quentin', 'lucas', 'gabriel', 'tiphaine', 'baptiste', 'charly', 'danny', 'alexandre', 'ulrich', 'florian',
            'jean', 'frederic', 'remi', 'bruce', 'romain', 'ludovic', 'nathanael', 'benjamin', 'lucas', 'maxime', 'maxence',
            'olivier', 'arthur', 'benoit', 'paul', 'etienne', 'tony'
        ];
    }


    private static function getSyllabes()
    {
        return [
            'la', 'le', 'les', 'li', 'lo', 'lu', 'lou', 'lan', 'lin', 'len',
            'ca', 'cau', 'ce', 'ci', 'co', 'cu', 'cui', 'cou', 'ceu', 'cor',
            'ba', 'bu', 'bi', 'bo', 'bou', 'ban', 'beu', 'bic',
            'sta', 'sto', 'stu', 'ste', 'sti', 'stou',
            'ma', 'me', 'mi', 'mo', 'mu', 'mou', 'man', 'men', 'min', 'mar',
            'fa', 'fe', 'fi', 'fo', 'fu', 'fou', 'fan', 'fin', 'far',
            'ga', 'ge', 'gue', 'gi', 'gui', 'gu', 'gus', 'gur',
            'ra', 're', 'ri', 'ro', 'ru', 'rou', 'ran', 'ras', 'rus', 'ris', 'ruk',
            'kail', 'tub', 'zic', 'zag', 'zin', 'zan', 'zou', 'usr', 'bin', 'var',
            '666', '123', 'mouch', 'zob', 'boom', 'bang'
        ];

    }
}