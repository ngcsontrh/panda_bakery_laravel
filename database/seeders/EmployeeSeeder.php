<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'fullname' => 'Nhân viên 1',
            'gender' => 'Male',
            'birthday' => '2004-02-20',
            'address' => 'Thanh Hoá',
            'phone' => '906548233',
            'user_id' => 1
        ]);

        Employee::create([
            'fullname' => 'Nhân viên 2',
            'gender' => 'Female',
            'birthday' => '2002-03-10',
            'address' => 'Hà Nội',
            'phone' => '231212121',
            'user_id' => 2
        ]);
    }
}
