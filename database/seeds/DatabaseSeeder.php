<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 10)->create();
        factory(App\Product::class, 50)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(SellerTableSeeder::class);
        $this->call(AdminVoyagerSeeder::class);
    }
}
