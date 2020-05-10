<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(config('app.env') == 'production'){
			$departement = base_path('database/postgres/departement.sql');
		}
		else{
			$departement = base_path('database\mysql\departement.sql');

		}
       DB::unprepared(file_get_contents($departement));
    }
}
