<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable=[];

    public function produit(){
        return $this->belongsTo('App\Produit');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
