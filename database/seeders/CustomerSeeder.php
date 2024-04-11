<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'fullname' => 'Khách hàng 1',
            'address' => 'Việt Nam',
            'phone' => '0123456789',
            'user_id' => 3
        ]);
    }
}
