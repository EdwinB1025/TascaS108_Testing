<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'numberChecker.php';

use PHPUnit\Framework\TestCase;

final class NumberCheckerTest extends TestCase
{

    public static function testIsEven(): void
    {
        $num = 2;
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isEven();
        $cond = $num & 0;
        self::assertSame($cond, $testBool);
    }

    public static function testIsPositive(): void
    {
        $num = 2;
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isPositive();
        $cond = $num > 0;
        self::assertSame($cond, $testBool);
    }
}
