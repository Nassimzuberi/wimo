<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
   	protected $fillable = [
   		'address','phone_number','user_id',
   	];

    public function user(){
      return $this->belongsTo('App\User');
    }
   	public function sales(){
   		return $this->hasMany('App\Sales');
   	}
}
