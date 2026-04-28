<?php
enum SpeedLimit: string
{
    case LENT = 'Molt lent';
    case ADEQUADA = 'Velocitat adequada';
    case LLEU = 'Excés lleu';
    case MODERAT = 'Excés moderat';
    case GREU = 'Excés greu';
}
class SpeedChecker
{
    public static SpeedLimit $check;
    public function __construct(int $num)
    {
        self::$check = self::speedCheck($num);
    }
    public static function speedCheck(int $num): SpeedLimit
    {
        return  match (true) {
            $num < 30 => SpeedLimit::LENT,
            $num  >= 30 && $num <= 60 => SpeedLimit::ADEQUADA,
            $num  >= 61 && $num <= 80 => SpeedLimit::LLEU,
            $num  >= 81 && $num <= 100 => SpeedLimit::MODERAT,
            $num > 100 => SpeedLimit::GREU
        };
    }
    public static function getResult(): string
    {
        return self::$check->value;
    }
}
