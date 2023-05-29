<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'HayRem'     ,'phone' => '09876545', 'email' => 'hayrem@gmail.com', 'password' => '123456789'],
            ['name' => 'Neoun'  ,'phone' => '02345687', 'email' => 'neoun@gmail.com', 'password' => '12345678'],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
