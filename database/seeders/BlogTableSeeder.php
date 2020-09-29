<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = new Blog([
            'title' => 'The Basement is Growing',
            'subtitle' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'paragraph' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet
                            Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'image' => '/img/basement.png'
        ]);
        $blog->save();

        $blog = new Blog([
            'title' => 'Throwback Thursday',
            'subtitle' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'paragraph' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet
                            Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'image' => '/img/throwback.png'
        ]);
        $blog->save();

        $blog = new Blog([
            'title' => 'Oh look at these beauts',
            'subtitle' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'paragraph' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet
                            Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'image' => '/img/shrooms.png'
        ]);
        $blog->save();

        $blog = new Blog([
            'title' => 'Something is happening',
            'subtitle' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'paragraph' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet
                            Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'image' => '/img/throwback.png'
        ]);
        $blog->save();

        $blog = new Blog([
            'title' => 'Super Long Random Ass Title I have no clue',
            'subtitle' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'paragraph' => 'Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet
                            Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet Lorem Ipsum dolor sit amet, lorem ipsum dolor sit amet',
            'image' => '/img/shrooms.png'
        ]);
        $blog->save();
    }
}
