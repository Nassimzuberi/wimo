<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function categories(){
		return $this->belongsToMany('App\Category','tags');
	}
	public function sales(){
		return $this->hasMany('App\Sales');
	}
}
