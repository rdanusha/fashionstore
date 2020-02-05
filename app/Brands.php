<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $guarded = false;


    public function clothes()
    {
        return $this->hasMany(Clothes::class);
    }


}
