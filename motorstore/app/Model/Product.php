<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class
    Product extends Model
{
    public function category() {
        return $this->belongsTo('App\Model\Category');
    }

    public function branch() {
        return $this->belongsTo('App\Model\Branch');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Model\Order');
    }

    public function images()
    {
        return $this->hasMany(ImageProduct::class, 'product_id');
    }

    public function post() {
        return $this->belongsTo('App\Model\Post');
    }
}
