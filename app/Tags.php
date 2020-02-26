<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function produit(){
      return $this->belongsToMany('App\Product');
    }
}
