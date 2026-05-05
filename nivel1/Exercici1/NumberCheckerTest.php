<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'numberChecker.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class NumberCheckerTest extends TestCase
{
    public function par(): array
    {
        $int = [
            'par 6' => [6]
        ];
        return $int;
    }
    public function impar(): array
    {
        $int = [
            'impar 9' => [9]
        ];
        return $int;
    }
    public function negativo(): array
    {
        $int = [
            'negativo -4' => [-4]
        ];
        return $int;
    }
    public function positivo(): array
    {
        $int = [
            'positivo 1' => [1]
        ];
        return $int;
    }
    public function cero(): array
    {
        $int = [
            'cero' => [0]
        ];
        return $int;
    }

    public function string(): array
    {
        $int = [
            'string' => ['text']
        ];
        return $int;
    }

    #[DataProvider('par')]
    public static function testIsEvenEven(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isEven();
        self::assertSame(true, $testBool);
    }

    #[DataProvider('impar')]
    public static function testIsEvenOdd(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isEven();
        self::assertSame(false, $testBool);
    }

    #[DataProvider('cero')]
    public static function testIsEvenZeroException(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isEven();
        self::assertSame(true, $testBool);
    }

    #[DataProvider('string')]
    public function testIsEvenStringException(mixed $num): void
    {
        $this->expectException(TypeError::class);
        $numCheck = new NumberChecker($num);
        $numCheck->isEven();
    }

    #[DataProvider('positivo')]
    public static function testIsPositive(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isPositive();
        self::assertSame(true, $testBool);
    }

    #[DataProvider('negativo')]
    public static function testIsNegative(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isPositive();
        self::assertSame(false, $testBool);
    }
    #[DataProvider('cero')]
    public static function testIsPositiveZeroException(int $num): void
    {
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isPositive();
        self::assertSame(false, $testBool);
    }

    #[DataProvider('string')]
    public function testIsPositiveStringException(mixed $num): void
    {
        $this->expectException(TypeError::class);
        $numCheck = new NumberChecker($num);
        $numCheck->isPositive();
    }
}
