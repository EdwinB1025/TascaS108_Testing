<?php
require_once 'SpeedChecker.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestSpeedChecker extends TestCase
{
    public function speedProvider(): array
    {
        $data = [20, 30, 45, 70, 100, 101, 150];
        $dataProvider = [];

        for ($i = 0; $i < sizeof($data); $i++) {
            $num = $data[$i];
            $case = match (true) {
                $num < 30 => 'Molt lent',
                $num  >= 30 && $num <= 60 => 'Velocitat adequada',
                $num  >= 61 && $num <= 80 => 'Excés lleu',
                $num  >= 81 && $num <= 100 => 'Excés moderat',
                $num > 100 => 'Excés greu'
            };
            $dataProvider['caso numero' . $i] = [$num, $case];
        }
        return $dataProvider;
    }

    #[DataProvider('speedProvider')]

    public static function testSpeedCheck(int $num, string $case): void
    {
        new SpeedChecker($num);
        self::assertSame($case, SpeedChecker::getResult());
    }
}
