<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable= ['name','img','description','prix_unit','prix_poids','quantity'];

    public function tags(){
      return $this->belongsToMany('App\Tags','tags_produits');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function commandes(){
      return $this->hasMany('App\Commande');
    }
}
