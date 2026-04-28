<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'numberChecker.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class NumberCheckerTest extends TestCase
{
    public function numProvider(): array
    {
        $int = [];
        for ($i = 0; $i < 10; $i++) {
            $int['caso' . $i] = [mt_rand(-100, 100)];
        }
        return $int;
    }

    #[DataProvider('numProvider')]
    public static function testIsEven(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isEven();
        $cond = $num & 0;
        self::assertSame($cond, $testBool);
    }

    public static function testIsPositive(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isPositive();
        $cond = $num > 0;
        self::assertSame($cond, $testBool);
    }
}
