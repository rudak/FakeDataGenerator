<?php
namespace Rudak\FDG;

class FakeSentence
{
    const TWO_WORDS      = 'twoWords';
    const SMALL_TITLE    = 'smallTitle';
    const TITLE          = 'title';
    const SMALL_SENTENCE = 'smallSentence';
    const SENTENCE       = 'sentence';
    const BIG_SENTENCE   = 'bigSentence';

    private static $wordlist;


    /**
     * Renvoie juste un petit titre de deux mots.
     * @return mixed
     */
    public static function getUltraSmallTitle()
    {
        return self::doTheJob(self::TWO_WORDS);
    }


    /**
     * Renvoie un petit titre
     * @return mixed
     */
    public static function getSmallTitle()
    {
        return self::doTheJob(self::SMALL_TITLE);
    }

    /**
     * Renvoie un titre de longueur standard
     * @return mixed
     */
    public static function getTitle()
    {
        return self::doTheJob(self::TITLE);
    }

    /**
     * Renvoie une petite phrase
     * @return mixed
     */
    public static function getSmallSentence()
    {
        return self::doTheJob(self::SMALL_SENTENCE);
    }

    /**
     * Renvoie une phrase
     * @return mixed
     */
    public static function getSentence()
    {
        return self::doTheJob(self::SENTENCE);
    }

    /**
     * Renvoie une grosse phrase
     * @return mixed
     */
    public static function getBigSentence()
    {
        return self::doTheJob(self::BIG_SENTENCE);
    }

    /**
     * Renvoie un paragraphe par defaut
     * @param int $nb le nombre de paragraphes attendus
     * @return string
     */
    public static function getParagraph($nb = 1)
    {
        $out = '';
        for ($i = 0; $i < $nb; $i++) {
            $out .= sprintf(self::getParagraphPattern(), self::doTheJob(self::BIG_SENTENCE));
        }

        return $out;
    }

    /**
     * Renvoie les balises HTML correspondant au paragraphe.
     * @return string
     */
    private static function getParagraphPattern()
    {
        return "<p>%s.</p>\n";
    }

    /**
     * Crée une liste de mot à partir de la chaine renvoyée par getBaseSentence()
     */
    private static function getWordlist()
    {
        if (!is_array(self::$wordlist)) {
            preg_match_all('/[A-Za-z0-9\-]{2,}/', strtolower(self::getBaseSentence()), $match);
            self::$wordlist = $match[0];
        }
        shuffle(self::$wordlist);
    }

    /**
     * Renvoie la phrase de base qui servira a découper les mots
     * @return string
     */
    private static function getBaseSentence()
    {
        return 'Ut sibi fuerat socius sagittis. Ego intervenerit. Vere quia a te nuper iratus occidit illos undecim
        annorum puer. Deinde, si hoc forte qui fuit imperavit. sempiternum Ut sciat oportet motum. Nunquam invenies eum.
        Hic de tabula. Ego vivere, ut debui, et nunc fiant. Istuc quod opus non est. Lorem ipsum occurrebat pragmaticam
        semper ut, si quis ita velim tibi bene recognoscere. Quorum duo te mihi videtur. Mauris a nunc occideritis me
        rectum. Videtur quod Ive facillimum, qui fecit vos. Potes me interficere, sine testibus et tunc manere in pauci
        weeks vel mensis vestigia Isai Pinkman et vos quoque illum occidere. Exercitium inutili option A. Videtur mihi
        quod autem est. Pergo coctione, et ego, et tu oblivisci Pinkman. Obliviscendum hoc unquam factum. Intelligamus
        hoc in sola SINGULTO multo aliter atque fructuosa negotium structura. Malo B. Option. To learn from the dark
        and the voices betweenBacon ipsum dolor amet pork loin meatball hamburger short ribs doner spare ribs chicken
        brisket jerky corned beef. Capicola ribeye pancetta biltong meatball short loin jowl.
         Hamburger tri-tip ball tip, ground round biltong bacon brisket ribeye pastrami. Corned beef drumstick jowl,
         bacon pork loin strip steak spare ribs kevin filet mignon landjaeger prosciutto t-bone. Leberkas biltong
         ribeye, beef ribs pork loin pancetta doner cupim flank frankfurter rump chuck picanha turducken. Tenderloin
         corned beef frankfurter ham beef hamburger pig prosciutto swine pork loin alcatra doner bresaola pancetta
         shoulder. Ground round hamburger flank prosciutto shank brisket drumstick';
    }

    /**
     * Renvoie une valeur en fonction du type de chaine choisie.
     * @param $type
     * @return int
     */
    private static function getLength($type)
    {
        switch ($type) {
            case self::TWO_WORDS:
                return 2;
                break;
            case self::SMALL_TITLE:
                return rand(3, 4);
                break;
            case self::TITLE:
                return rand(5, 10);
                break;
            case self::SMALL_SENTENCE:
                return rand(15, 25);
                break;
            case self::SENTENCE:
                return rand(30, 45);
                break;
            case self::BIG_SENTENCE:
                return rand(55, 100);
                break;
        }
    }

    /**
     * Va chercher la liste de mots
     * boucle dessus en fonction de la taille choisie pour former une chaine.
     * @param $type
     * @return mixed
     */
    private static function doTheJob($type)
    {
        $out = '';
        self::getWordlist();

        for ($i = 0; $i < self::getLength($type); $i++) {
            $word = array_shift(self::$wordlist);
            $out .= $word . ' ';
        }

        return trim($out);
    }
}