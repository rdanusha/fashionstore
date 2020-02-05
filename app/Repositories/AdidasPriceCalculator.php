<?php


namespace App\Repositories;



class AdidasPriceCalculator implements ProductPriceInterface
{

    public static function calculate($cost)
    {
        return $cost + ($cost/100)*15;
    }
}
