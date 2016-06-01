<?php
namespace Rudak\Bundle\FakeDataGenerator\Factory;

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
        return 'At the aquarium hospital veterinarians and volunteers have been working 12
         to 16-hour days since mid-November They test the turtles for dehydration give some
         of them X-rays to see if they have pneumonia treat them with medication if necessary
         and care for them while they start swimming in baby pools and then graduate to larger
         ones Each day the turtles body temperatures are raised 5 degrees Now when the
         turtles are ready to move to be released in Florida or held in other aquariums
         until sea temperatures rise one friendly pilot is no longer enough The Coast Guard
         flew 193 turtles to Florida in November Private planes have carried others. Staff
         members from the National Aquarium in Baltimore drove some turtles from Boston.
         Every aquarium on the East Coast has taken in some of them until they can be
         released later We called in all the favors we can Dr Charles Innis
         director of animal health for the New England Aquarium, said last week. At the
         time, there were about 200 turtles in various stages of recovery at the animal
         hospital the aquarium built and staffed The number of turtles stranded on Cape
         Cod Bay beaches has been increasing for decades, perhaps because conservation
         efforts have been successful for the Kemp ridley perhaps because the ocean
         has warmed.But nothing suggested that a year like this would happen Previous
         record years were 1989 with about 100 stranded turtles 1999 when 163 were
         found; and 2012 with 413.Over the years, Mr Prescott said, as the number
         of turtles rescued on the Cape increased, those found on the north shore of
         Long Island decreased This year only 23 had been found in New York by
         early December Black candles dance to an overture But I am drawn past their
         flickering lure To the breathing forest that surrounds the room Where the
         vigilant trees push out of the womb sip the blood-red wine My thoughts weigh
         heavy with the burden  time From knowledge drunk from the fountain of life
         From Chaos born out  love and the scythe The forest beckons with her nocturnal
         call To pull me close amid the baying of wolves Where the bindings of Christ
         are down-trodden with scorn  In the dark odiferous earth We embrace like two
         lovers  death monument to the trapping of breath As restriction is bled
         from the veins of my neck To drop roses on my marbled breast I lust for the
         wind and the flurry  leaves And the perfume of flesh on the murderous breeze
         To learn from the dark and the voices between';
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