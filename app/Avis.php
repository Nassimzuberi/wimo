<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    public function produit() {
    	return $this->belongsTo('App/produit');
    }
}
