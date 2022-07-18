<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){
            DB::table('clients')->insert([
                'full_name'=>Str::random(5)." ".Str::random(5)." ".Str::random(5),
                'gender'=>rand(0,1),
                'phone_num'=>'+79'.rand(100000000,999999999),
                'address'=>Str::random(10),
            ]);
        }
    }
}
