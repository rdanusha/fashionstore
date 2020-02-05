<?php


namespace App\Repositories;


class NikePriceCalculator implements ProductPriceInterface
{
    public static function calculate($cost)
    {
        return $cost + (($cost / 100) * 15) + 100;
    }
}
