<?php

use Illuminate\Database\Seeder;
use App\Inventaire;
class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10)->create()->each(function ($user){
          $user->seller()->save(factory(App\Seller::class)->make());
          $user->seller->sales()->save(factory(App\Sales::class)->make());
          foreach($user->seller->sales as $sale){
            Inventaire::create(['quantity' => 5,'sale_id' => $sale->id]);
          }
        });
    }
}
