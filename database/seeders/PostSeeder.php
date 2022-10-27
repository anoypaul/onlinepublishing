<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend\PostModel;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 5; $i++) { 
            $post = new PostModel();
            $post->posts_title = $faker->title();
            $post->posts_description = "This is seed description". $faker->title();
            $post->posts_type = '1';
            $post->posts_author = 'shrabon';
            $post->save();
        }

    }
}
