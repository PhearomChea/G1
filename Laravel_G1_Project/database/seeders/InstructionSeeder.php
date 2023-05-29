<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructions = [
            ['speed' => '70mph', 'height' => '10m', 'plan_id' => 1, 'drone_id' => 4],
            ['speed' => '60mph', 'height' => '5m', 'plan_id' => 3, 'drone_id' => 1],
            ['speed' => '135mph', 'height' => '15m', 'plan_id' => 4, 'drone_id' => 3],
            ['speed' => '179mph', 'height' => '20m', 'plan_id' => 2, 'drone_id' => 2],
        ]; 
        foreach ($instructions as $key => $instruction) {
            Instruction::create($instruction);
        }
    }
}
