<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Category::class,10)->create();
      factory(App\Product::class,10)->create();
      $this->call(UsersTableSeeder::class);
      $this->call(SellerTableSeeder::class);
    }
}
