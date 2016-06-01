<?php
namespace Rudak\FDG\Factory;

class FakeSentence
{
    private static $wordlist;

    private static $previous;

    public static function getUltraSmallTitle()
    {
        return self::doTheJob('twoWords');
    }

    private static function doTheJob($type)
    {
        $out = '';
        self::getWordlist();

        for ($i = 0; $i < self::getLength($type); $i++) {
            $word = self::$wordlist[$i];
            while ($word == self::$previous) {
                shuffle(self::$wordlist);
                $word = self::$wordlist[$i];
            }
            self::setPrevious($word);
            $out .= $word . ' ';
        }

        return trim($out);
    }

    private static function getWordlist()
    {
        if (!is_array(self::$wordlist)) {
            preg_match_all('/[A-Za-z0-9\-]{2,}/', strtolower(self::getBaseSentence()), $match);
            self::$wordlist = $match[0];
        }
        shuffle(self::$wordlist);
    }

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

    private static function getLength($type)
    {
        switch ($type) {
            case 'twoWords':
                return 2;
                break;
            case 'smallTitle':
                return rand(3, 4);
                break;
            case 'title':
                return rand(5, 10);
                break;
            case 'smallSentence':
                return rand(15, 25);
                break;
            case 'sentence':
                return rand(30, 45);
                break;
            case 'bigSentence':
                return rand(55, 100);
                break;
        }
    }

    private static function setPrevious($word)
    {
        self::$previous = $word;
    }

    public static function getSmallTitle()
    {
        return self::doTheJob('smallTitle');
    }

    public static function getTitle()
    {
        return self::doTheJob('title');
    }

    public static function getSmallSentence()
    {
        return self::doTheJob('smallSentence');
    }

    public static function getSentence()
    {
        return self::doTheJob('sentence');
    }

    public static function getBigSentence()
    {
        return self::doTheJob('bigSentence');
    }

    public static function getParagraph($nb = 1)
    {
        $out = '';
        for ($i = 0; $i < $nb; $i++) {
            $out .= sprintf(self::getParagraphPattern(), self::doTheJob('bigSentence'));
        }

        return $out;
    }

    private static function getParagraphPattern()
    {
        return "<p>%s.</p>\n";
    }
}