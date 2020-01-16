<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        factory(App\Tags::class, 5)->create();
        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->produits()->save(factory(App\Produit::class)->make());
            $user->commandes()->save(factory(App\Commande::class)->make());
            foreach($user->produits as $produit){
                $produit->tags()->attach([Faker\Factory::create()->numberBetween(1,5)]);
            }
        });
    }
}
