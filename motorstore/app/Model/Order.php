<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
}
