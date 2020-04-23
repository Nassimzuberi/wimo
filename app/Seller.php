<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
   	protected $fillable = [
   	  'name_shop','address','phone_number','user_id','position'
   	];

    /* 
      Conversion du json en Objet les informations de la position du vendeur.
      Ajout du nouvel attribut coordinates dans la Classe ou Model Seller 
    */
   	public function setCoordinates(){
      $this->coordinates = json_decode($this->position);
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
   	public function sales(){
   		return $this->hasMany('App\Sales');
   	}
}
