<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable=['produit_id','user_id','total','quantity','payement_option','state'];

    public function produit(){
        return $this->belongsTo('App\Produit');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
