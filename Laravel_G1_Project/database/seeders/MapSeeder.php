<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maps = [
            ['image' => 'MangoFarm' , 'drone_id' =>1 , 'farm_id' =>2],
            ['image' => 'OrangeFarm' , 'drone_id' =>2 , 'farm_id' =>1],
            ['image' => 'ChanteyFarm' , 'drone_id' =>4 , 'farm_id' =>3],
            ['image' => 'RiceFarm' , 'drone_id' =>3 , 'farm_id' =>4],
            ['image' => 'ohhYeahFarm' , 'drone_id' =>3 , 'farm_id' =>5],
            ['image' => 'hahFarm' , 'drone_id' =>4 , 'farm_id' =>6],
            ['image' => 'emmFarm' , 'drone_id' =>1 , 'farm_id' =>7],
            ['image' => 'loyFarm' , 'drone_id' =>2 , 'farm_id' =>8],
        ];
        foreach ($maps as $map) {
            Map::create($map);
        }
    }
}
