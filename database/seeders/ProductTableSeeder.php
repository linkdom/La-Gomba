<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'title' => 'Oyster Mushrooms',
            'subtitle' => 'Quality A',
            'description' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'price' => '19',
            'image' => '/img/oysterQA.jpeg'
        ]);
        $product->save();

        $product = new Product([
            'title' => 'Oyster Mushrooms',
            'subtitle' => 'Quality B',
            'description' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'price' => '16',
            'image' => '/img/oysterQB.jpeg'
        ]);
        $product->save();
    }
}
