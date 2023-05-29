<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['province' => 'PreyVeng'],
            ['province' => 'Kandal'],
            ['province' => 'KompongCham'],
            ['province' => 'PhnomPenh'],
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
