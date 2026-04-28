<?php
require_once 'SpeedChecker.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestSpeedChecker extends TestCase
{
    public function speedProvider(): array
    {
        $data = [];
        for ($i = 0; $i < 2; $i++) {
            $num = (int)mt_rand(0, 150);
            $case = match (true) {
                $num < 30 => 'Molt lent',
                $num  >= 30 && $num <= 60 => 'Velocitat adequada',
                $num  >= 61 && $num <= 80 => 'Excés lleu',
                $num  >= 81 && $num <= 100 => 'Excés moderat',
                $num > 100 => 'Excés greu'
            };
            $data['caso numero' . $i] = [$num, $case];
        }
        return $data;
    }

    #[DataProvider('speedProvider')]

    public static function testSpeedCheck(int $num, string $case): void
    {
        new SpeedChecker($num);
        self::assertSame($case, SpeedChecker::getResult());
    }
}
