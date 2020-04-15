<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminVoyagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('app.env') == 'production'){
            $data_voyager = base_path('administration_prod.sql');
        }
        else{
            $data_voyager = base_path('administration.sql');

        }
        DB::unprepared(file_get_contents($data_voyager));
    }
}
