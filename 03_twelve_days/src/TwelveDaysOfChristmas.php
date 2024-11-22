<?php declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class TwelveDaysOfChristmas
{

    CONST DAY_LINES = [
        1 => ['First', 'partridge in a pear tree'],
        2 => ['Second', 'Two turtle doves'],
        3 => ['Third', 'Three French hens'],
        4 => ['Fourth', 'Four calling birds'],
        5 => ['Fifth', 'Five golden rings'],
        6 => ['Sixth', 'Six geese a-laying'],
        7 => ['Seventh', 'Seven swans a-swimming'],
        8 => ['Eighth', 'Eight maids a-milking'],
        9 => ['Ninth', 'Nine ladies dancing'],
        10 => ['Tenth', 'Ten lords a-leaping'],
        11 => ['Eleventh', 'Eleven pipers piping'],
        12 => ['Twelfth', 'Twelve drummers drumming'],
    ];

    public function daysOfChristmas(int $day)
    {

        if ($day > 12 || $day < 1) {
            throw new InvalidArgumentException("Day $day must be between 1 and 12 inclusive");
        }

        $dayLine = self::DAY_LINES[$day];

        $song = "On the $dayLine[0] day of Christmas, My true love gave to me:";

        if ($day === 1) {
            return $song . "\n A " . $dayLine[1];
        }

        $finalSong = $this->addDaysOfChristmas($song, $day);

        return $finalSong;
    }

    private function addDaysOfChristmas(string $song, int $currentDay=null): string
    {
        if ($currentDay > 1) {
            $dayLine = self::DAY_LINES[$currentDay];

            $song = $song . "\n" . $dayLine[1] . ',';

            $song = $this->addDaysOfChristmas($song, $currentDay-1);
        } else {
            $song = $song . "\nAnd a " . self::DAY_LINES[1][1] . '.';
        }

        return $song;
    }
}
