<?php

namespace App\Repositories;

use App\Brands;
use App\Clothes;

class ProductRepository implements ProductRepositoryInterface
{

    public static function getAllBrands()
    {
        return Brands::all();
    }

    public function get($cloth_id)
    {
        return Clothes::findorFail($cloth_id);
    }

    public function all()
    {
        return Clothes::all();
    }

    public function delete($id)
    {
        Clothes::destroy($id);
    }

    public function update($id, $request)
    {

        $cloth = Clothes::find($id);
        $brand = BrandRepository::getBrandById($request->brand_id);

        $clothe_attr = [
            'name' => $request->name,
            'product_code' => $request->product_code,
            'short_description' => $request->description,
            'cost' => $request->cost,
            'color' => $request->color,
            'size' => $request->size,
            'brand_id' => $request->brand_id,
            'selling_price' => $this->calculate_price($brand, $request->cost),

        ];

        $cloth->update($clothe_attr);
    }

    public function store($request)
    {

        $brand = BrandRepository::getBrandById($request->brand_id);

        $clothe_attr = [
            'name' => $request->name,
            'product_code' => $request->product_code,
            'short_description' => $request->description,
            'cost' => $request->cost,
            'color' => $request->color,
            'size' => $request->size,
            'brand_id' => $request->brand_id,
            'selling_price' => $this->calculate_price($brand, $request->cost),

        ];
        Clothes::create($clothe_attr);

    }

    /**
     * @param $brand
     * @param $cost
     * @return AdidasPriceCalculator|NikePriceCalculator|OtherPriceCalculator
     */
    public function calculate_price($brand, $cost)
    {
        $price = 0;
        switch ($brand->name) {
            case 'Adidas':
               return AdidasPriceCalculator::calculate($cost);
                break;
            case 'Nike':
                return AdidasPriceCalculator::calculate($cost);
                break;
            default:
                return AdidasPriceCalculator::calculate($cost);
        }


    }
}
