<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model as Model;


class Product extends Model {

    public function category() {
        return $this->belongsTo('App\models\Category');
    }

}