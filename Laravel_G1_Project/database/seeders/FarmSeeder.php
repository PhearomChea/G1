<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $farms = [
            ['area' => 'POLYGON((11.9924000,105.4645030   11.9924506,105.4645057 11.9924102,105.4645254))' , 'user_id' => 1 ,'province_id' => 2],
            ['area' => 'POLYGON((11.9924034,105.4645030   11.9924060,105.4645057 11.9924102,105.4645254))' , 'user_id' => 2 ,'province_id' => 3],
            ['area' => 'POLYGON((11.8834000,105.4645030   11.9924456,105.4645057 11.9924102,105.4645254))' , 'user_id' => 1 ,'province_id' => 1],
            ['area' => 'POLYGON((11.9123750,105.4645690   11.9925646,105.4645057 11.9924102,105.4645254))' , 'user_id' => 2 ,'province_id' => 1],
            ['area' => 'POLYGON((11.9123750,105.4645690   11.9925646,105.4645057 11.9924102,105.4645254))' , 'user_id' => 1 ,'province_id' => 1],
            ['area' => 'POLYGON((11.9123750,105.4645690   11.9925646,105.4645057 11.9924102,105.4645254))' , 'user_id' => 2 ,'province_id' => 1],
            ['area' => 'POLYGON((11.9123750,105.4645690   11.9925646,105.4645057 11.9924102,105.4645254))' , 'user_id' => 1 ,'province_id' => 1],
            ['area' => 'POLYGON((11.9123750,105.4645690   11.9925646,105.4645057 11.9924102,105.4645254))' , 'user_id' => 2 ,'province_id' => 1],
            ['area' => 'POLYGON((11.9123750,105.4645690   11.9925646,105.4645057 11.9924102,105.4645254))' , 'user_id' => 1 ,'province_id' => 1],
        ];
        foreach ($farms as $farm) {
            Farm::create($farm);
        }
    }
}
