<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'employee1',
            'password' => 'employee1',
            'role' => 'Employee'
        ]);
        User::create([
            'username' => 'employee2',
            'password' => 'employee2',
            'role' => 'Employee'
        ]);
        User::create([
            'username' => 'customer1',
            'password' => 'customer1',
            'role' => 'customer'
        ]);
        User::create([
            'username' => 'manager1',
            'password' => 'manager1',
            'role' => 'manager'
        ]);
    }
}
