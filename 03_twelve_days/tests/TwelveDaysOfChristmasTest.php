<?php declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use InvalidArgumentException;
use App\TwelveDaysOfChristmas;
use TypeError;

#[CoversClass(TwelveDaysOfChristmas::class)]
class TwelveDaysOfChristmasTest extends TestCase
{
    private TwelveDaysOfChristmas $twelveDaysOfChristmas;

    public function setUp(): void
    {
        $this->twelveDaysOfChristmas = new TwelveDaysOfChristmas();
    }

    public function test_tdoc_returns_string_when_passed_int(): void
    {
        $this->assertIsString($this->twelveDaysOfChristmas->daysOfChristmas(1));
    }

    public function test_tdoc_returns_error_when_not_passed_int(): void
    {
        $this->expectException(TypeError::class);
        $this->twelveDaysOfChristmas->daysOfChristmas('1');
    }

    public function test_tdoc_returns_error_when_passed_int_outside_1_12(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->twelveDaysOfChristmas->daysOfChristmas(-1);
        $this->twelveDaysOfChristmas->daysOfChristmas(13);
    }

    public function test_tdoc_returns_first_verse_and_day_lines(): void
    {

        $expected = "On the First day of Christmas, My true love gave to me:\n A partridge in a pear tree";
        $result = $this->twelveDaysOfChristmas->daysOfChristmas(1);

        $this->assertEquals($expected, $result);
    }

    public function test_tdoc_returns_full_song_when_passed_12(): void
    {
        $expected = "On the Twelfth day of Christmas, My true love gave to me:\nTwelve drummers drumming,
Eleven pipers piping,
Ten lords a-leaping,
Nine ladies dancing,
Eight maids a-milking,
Seven swans a-swimming,
Six geese a-laying,
Five golden rings,
Four calling birds,
Three French hens,
Two turtle doves,
And a partridge in a pear tree.";

        $result = $this->twelveDaysOfChristmas->daysOfChristmas(12);

        $this->assertEquals($expected, $result);
    }
}
