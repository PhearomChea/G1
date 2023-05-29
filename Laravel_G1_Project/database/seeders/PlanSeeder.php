<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            ['plan_name' => 'Order01', 'date_time' => '2023-05-26 16:00:0', 'user_id' => 1 , 'farm_id' => 2],
            ['plan_name' => 'Order04', 'date_time' => '2023-05-27 09:30:0', 'user_id' => 2 , 'farm_id' => 1],
            ['plan_name' => 'Order03', 'date_time' => '2023-05-26 16:00:0', 'user_id' => 1 , 'farm_id' => 2],
            ['plan_name' => 'Order04', 'date_time' => '2023-05-26 16:00:0', 'user_id' => 1 , 'farm_id' => 2],
            ['plan_name' => 'monitorTheField', 'date_time' => '2023-05-26 16:00:0', 'user_id' => 1 , 'farm_id' => 2],
            ['plan_name' => 'fertilizersOnTheSoil', 'date_time' => '2023-05-26 16:00:0', 'user_id' => 1 , 'farm_id' => 2],
            ['plan_name' => 'order66', 'date_time' => '2023-05-26 16:00:0', 'user_id' => 2 , 'farm_id' => 2],
        ];
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
