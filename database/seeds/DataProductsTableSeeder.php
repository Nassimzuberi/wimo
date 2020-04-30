<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		if(config('app.env') == 'production'){
			$data_products = base_path('database/products.sql');
		}
		else{
			$data_products = base_path('database\products.sql');

		}
       DB::unprepared(file_get_contents($data_products));
    }
}
