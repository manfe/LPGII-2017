<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model as Model;


class Category extends Model {

    public function products() {
        return $this->hasMany('App\models\Product');
    }

}