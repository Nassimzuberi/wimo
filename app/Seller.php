<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
   	protected $fillable = [
   		'address','phone_number','user_id',
   	];

   	public function sales(){
   		return $this->hasMany('App\Sales');
   	}
}
