<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(FarmSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(DroneSeeder::class);
        $this->call(InstructionSeeder::class);
        $this->call(MapSeeder::class);
    }
}
