<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Bánh sinh nhật',
            'price' => '100000',
            'inventory' => '3',
            'description' => 'Bánh sinh nhật ngon',
            'image' => asset('images/products/1712842276.jpg')
        ]);

        Product::create([
            'name' => 'Bánh muffin vani',
            'price' => '50000',
            'inventory' => '5',
            'description' => 'Bánh muffin vani ngon',
            'image' => asset('images/products/1712842317.jpg')
        ]);

        Product::create([
            'name' => 'Bánh kem socola',
            'price' => '70000',
            'inventory' => '1',
            'description' => 'Bánh muffin vani ngon',
            'image' => asset('images/products/1712842598.jpg')
        ]);
    }
}
