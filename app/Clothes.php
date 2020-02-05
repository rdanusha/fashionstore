<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{

    protected $guarded = [];


    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }
}
