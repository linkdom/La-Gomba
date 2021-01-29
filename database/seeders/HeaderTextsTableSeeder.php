<?php

namespace Database\Seeders;

use App\Models\HeaderText;
use Illuminate\Database\Seeder;

class HeaderTextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = new HeaderText([
            'title' => 'EAT MORE MUSHROOMS!',
            'subtitle' => 'Meat consumption needs to be cut and by eating mushrooms people can help saving the Planet. Lagomba believes that creating oyster mushrooms in urban conditions can help thriving it.',
            'slug' => 'blog',
            'status' => '1'
        ]);
        $text->save();

        $text = new HeaderText([
            'title' => 'LOREM IPSUM DOLOR SIT AMET!',
            'subtitle' => 'lorem ipsum lalalala about',
            'slug' => 'about',
            'status' => '0'
        ]);
        $text->save();

        $text = new HeaderText([
            'title' => 'LOREM IPSUM DOLOR SIT AMET!',
            'subtitle' => 'lorem ipsum lalalala shopping cart',
            'slug' => 'shopping-cart',
            'status' => '0'
        ]);
        $text->save();

        $text = new HeaderText([
            'title' => 'LOREM IPSUM DOLOR SIT AMET!',
            'subtitle' => 'lorem ipsum lalalala product-details',
            'slug' => 'product-details',
            'status' => '0'
        ]);
        $text->save();

        $text = new HeaderText([
            'title' => 'LOREM IPSUM DOLOR SIT AMET!',
            'subtitle' => 'lorem ipsum lalalala blog-details',
            'slug' => 'blog-details',
            'status' => '0'
        ]);
        $text->save();
    }
}
