<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Sales extends Pivot
{
	protected $table = "sales";
    protected $attributes = [
        'img' => 'sales-default.png',
    ];

   protected $fillable = [
      'description',
      'price',
      'quantity',
      'price_mesure',
      'quantity_mesure',
      'seller_id','product_id', 
      'img',
      'origine',
      'stock'
   	];

		public function seller(){
			return $this->belongsTo('App\Seller');
		}
   	public function product(){
   		return $this->belongsTo('App\Product');
   	}
}
