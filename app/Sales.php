<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Sales extends Pivot
{
	protected $table = "sales";
   protected $fillable = [
   		'description','price_weight','price_unit','seller_id','product_id',
   	];

		public function seller(){
			return $this->belongsTo('App\Seller');
		}
   	public function product(){
   		return $this->belongsTo('App\Product');
   	}

   	public function inventaire(){
   		return $this->hasOne("App\Inventaire",'sale_id');
   	}
}
