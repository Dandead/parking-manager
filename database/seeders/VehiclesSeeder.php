<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = DB::table('clients')->select('client_id')->get();
        foreach($clients as $client)
        {
            $vehicles = rand(1,4);
            for($i=0; $i<$vehicles; $i++)
            {
                DB::table('vehicles')->insert([
                    'brand'=>Str::random(10),
                    'model'=>Str::random(10),
                    'color'=>Str::random(10),
                    'licence_plate'=>'ку'.rand(100,999).'e'.rand(10,999),
                    'is_active'=>rand(0,1),
                    'client_id'=>$client->client_id,
                ]);
            }
        }
    }
}
