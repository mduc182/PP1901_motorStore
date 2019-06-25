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

    public function order()
    {
        return $this->belongsTo('App\Model\Order');
    }
}
