<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
   	protected $fillable = [
   		'address','phone_number','user_id','position'
   	];

   	public function address(){
   	    $data = json_decode($this->address);
   	    $full = $data->num." ".$data->voie. ", ". $data->cp." ". $data->commune;
   	    return $full;
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
   	public function sales(){
   		return $this->hasMany('App\Sales');
   	}
}
