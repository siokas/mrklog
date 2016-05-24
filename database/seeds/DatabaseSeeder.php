<?php

use Illuminate\Database\Seeder;
use App\Models\Post as Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PostsTableSeeder::class);
    }
}

/**
* Seed the Posts table with dummy data
*
*/
class PostsTableSeeder extends Seeder{
	
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    	$faker = Faker\Factory::create();
    	Post::truncate();

    	foreach (range(1, 30) as $index) {
    		
    		Post::create([
    			'title' => $faker->sentence,
    			'article' => $faker->realText(9000),
                'author' => $faker->lastName,
    			'image' => $faker->imageUrl(1900, 600),
                'pin' => $faker->md5, 
    		]);
    	}

    }
}
