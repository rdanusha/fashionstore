<?php


namespace App\Repositories;


use App\Brands;

class BrandRepository
{

    public static function getBrandById($id)
    {
        return Brands::find($id);
    }
}
