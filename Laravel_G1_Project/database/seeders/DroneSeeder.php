<?php

namespace Database\Seeders;

use App\Models\Drone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DroneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drones = [
            ['drone_id' => 'D20', 'type_of_drone' => 'Multi-Rotor Drones' , 'battery' => '90%' , 'payload_capacity' => '20L', 'date_time' => '2023-06-01 10:00:00' , 'location_id' => 1],
            ['drone_id' => 'D21', 'type_of_drone' => 'Fixed-Wing Drones' , 'battery' => '100%' , 'payload_capacity' => '30L', 'date_time' => '2023-06-02 10:00:00' , 'location_id' => 3],
            ['drone_id' => 'D22', 'type_of_drone' => 'Single-Rotor Drones' , 'battery' => '85%' , 'payload_capacity' => '20L', 'date_time' => '2023-06-03 10:00:00' , 'location_id' => 2],
            ['drone_id' => 'D23', 'type_of_drone' => 'Fixed-Wing Hybrid VTOL' , 'battery' => '97%' , 'payload_capacity' => '30L', 'date_time' => '2023-06-04 10:00:00' , 'location_id' => 4],
        ];
        foreach ($drones as $drone) {
            Drone::create($drone);
        }
    }
}
