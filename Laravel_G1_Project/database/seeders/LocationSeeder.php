<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['latitude' => '45a' , 'longitude' => '100a'],
            ['latitude' => '100a' , 'longitude' => '100a'],
            ['latitude' => '20a' , 'longitude' => '100a'],
            ['latitude' => '75a' , 'longitude' => '100a'],
            ['latitude' => '60a' , 'longitude' => '100a'],
        ];
        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
