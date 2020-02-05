<?php

namespace App\Repositories;

use App\Http\Requests\BrandsStoreRequest;

interface ProductRepositoryInterface
{
    public function get($brands_id);

    public function all();

    public function delete($brands_id);

    public function update($id, $request);

    public function store($request);
}
