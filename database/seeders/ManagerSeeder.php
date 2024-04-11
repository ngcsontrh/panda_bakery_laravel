<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manager::create([
            'fullname' => 'Quản lý 1',
            'gender' => 'Male',
            'birthday' => '1999-03-09',
            'address' => 'Hải Phòng',
            'phone' => '3232323232',
            'user_id' => 4
        ]);
    }
}
