<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function contacts() {
        return $this->hasMany('App\Model\Contact', 'user_id');
    }

    public function orders() {
        return $this->hasMany('App\Model\Order', 'user_id');
    }
}
