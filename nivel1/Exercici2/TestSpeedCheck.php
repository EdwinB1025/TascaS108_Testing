<?php

use PHPUnit\Framework\TestCase;

class TestSpeedChecker extends TestCase
{
    public static function testSpeedCheck(): void
    {
        $num = 0;
        $case =  match (true) {
            $num < 30 => 'Molt lent',
            $num  >= 30 && $num <= 60 => 'Excés lleu',
            $num  >= 81 && $num <= 100 => 'Excés moderat',
            $num > 100 => 'Molt lent'
        };
        self::assertSame($case, SpeedChecker::speedCheck($num));
    }
}
