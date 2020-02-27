<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable=['sales_id','user_id','total','quantity','payement_option','state'];

    public function sales(){
        return $this->belongsTo('App\Sales');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
