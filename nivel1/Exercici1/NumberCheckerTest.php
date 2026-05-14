<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'numberChecker.php';

use PhpParser\Node\Expr\Cast\Object_;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use function PHPSTORM_META\type;

final class NumberCheckerTest extends TestCase
{
    public function dataProviderEven(): array
    {
        $dataProvider = [
            'par 6' => [6, true],
            'impar 9' => [9, false],
            'cero' => [0, true],
            'bool' => [true, TypeError::class],
            'array' => [[0, 2, 5], TypeError::class],
            'string' => ["hola", TypeError::class],
            'object' => [new stdClass(), TypeError::class]

        ];
        return $dataProvider;
    }

    public function dataProviderPositive(): array
    {
        $dataProvider = [
            'positive 6' => [6, true],
            'negative -9' => [-9, false],
            'cero' => [0, true],
            'bool' => [true, TypeError::class],
            'array' => [[0, 2, 5], TypeError::class],
            'string' => ["hola", TypeError::class],
            'object' => [new stdClass(), TypeError::class]

        ];
        return $dataProvider;
    }

    #[DataProvider('dataProviderEven')]

    public function testIsEven(mixed $num, mixed $case): void
    {
        $typeError = ["string", "array", "object", "NULL", "bool"];
        if (in_array(gettype($num), $typeError, true)) {
            $this->expectException($case);
        }
        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isEven();
        if (gettype($num) === "integer") {
            self::assertSame(true, $testBool);
        }
    }

    #[DataProvider('dataProviderPositive')]

    public function testIsPositive(mixed $num, mixed $case): void
    {
        $typeError = ["string", "array", "object", "NULL", "bool"];
        if (in_array(gettype($num), $typeError, true)) {
            $this->expectException($case);
        }

        $numCheck = new NumberChecker($num);
        $testBool = $numCheck->isPositive();

        if (gettype($num) === "integer") {
            self::assertSame(true, $testBool);
        }
    }
}
