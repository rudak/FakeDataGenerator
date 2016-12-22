<?php
namespace Rudak\FDG;

class FakeUser
{

    public static function getFirstName($uppercase = true)
    {
        $list = self::getFirstNamesList();
        $name = $list[array_rand($list)];

        return $uppercase ? ucfirst($name) : $name;
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
            'olivier', 'arthur', 'benoit', 'paul', 'etienne', 'tony',
        ];
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
            'lagarde', 'coulon', 'dadet', 'bonnet',
        ];
    }

    public static function getPseudo($nb = 3, $uppercase = true)
    {
        $list   = self::getSyllabes();
        $pseudo = '';
        for ($i = 0; $i < $nb; $i++) {
            $pseudo .= Probability::success(5) ? mt_rand(10, 99) : null;
            $pseudo .= $list[array_rand($list)];
            $pseudo .= Probability::success(10) ? mt_rand(10, 99) : null;
        }
        $pseudo .= Probability::success(70) ? mt_rand(10, 99) : null;

        return $uppercase ? ucfirst($pseudo) : $pseudo;

    }

    private static function getSyllabes()
    {
        return [
            '666', '123', 'mouch', 'zob', 'boom', 'bang',
            'ba', 'bu', 'bi', 'bo', 'bou', 'ban', 'beu', 'bic',
            'ca', 'cau', 'ce', 'ci', 'co', 'cu', 'cui', 'cou', 'ceu', 'cor',
            'fa', 'fe', 'fi', 'fo', 'fu', 'fou', 'fan', 'fin', 'far',
            'ga', 'ge', 'gue', 'gi', 'gui', 'gu', 'gus', 'gur',
            'kail', 'tub', 'zic', 'zag', 'zin', 'zan', 'zou', 'usr', 'bin', 'var',
            'la', 'le', 'les', 'li', 'lo', 'lu', 'lou', 'lan', 'lin', 'len',
            'ma', 'me', 'mi', 'mo', 'mu', 'mou', 'man', 'men', 'min', 'mar',
            'ra', 're', 'ri', 'ro', 'ru', 'rou', 'ran', 'ras', 'rus', 'ris', 'ruk',
            'sta', 'sto', 'stu', 'ste', 'sti', 'stou',
        ];
    }
}