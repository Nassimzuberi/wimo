<?php

use Illuminate\Database\Seeder;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(config('app.env') == 'production'){
			$data_products = base_path('database/pays.sql');
		}
		else{
			$data_products = base_path('database\pays.sql');

		}
       DB::unprepared(file_get_contents($data_products));
    }
}
