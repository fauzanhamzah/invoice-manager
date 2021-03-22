<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Avometer',
            'description' => '',
            'stock' => '35',
            'price' => 520000
        ]);
        Product::create([
            'name' => 'Power Supply',
            'description' => 'Kalibrasi',
            'stock' => '40',
            'price' => 450000
        ]);
        Product::create([
            'name' => 'Sigmat',
            'description' => 'Kalibrasi',
            'stock' => '65',
            'price' => 310000
        ]);
    }
}
