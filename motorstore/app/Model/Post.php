<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
}
