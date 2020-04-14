<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=['text','type','state','response'];

    public function typeprob() {
        $tab = [
            1 => 'Problème avec un produit',
            2 => 'Problème avec une commande',
            3 => 'Problème avec le site'
        ];
        return $tab[$this->type];
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
