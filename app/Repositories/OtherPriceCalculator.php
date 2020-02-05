<?php


namespace App\Repositories;


class OtherPriceCalculator implements ProductPriceInterface
{

    public static function calculate($cost)
    {
        return $cost + (($cost / 100) * 10);
    }
}
