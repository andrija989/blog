<?php

use Illuminate\Database\Seeder;

use App\Tag;
use App\Post;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Blogging',
            'Freelancing',
            'How to',
            'Internet Marketing',
            'Other'
        ];

        // Post::all()->each(function(Post $post){$post->tags()->detach();});    ukoliko zelimo da ispraznimo post_tag tabelu
        Tag::truncate();

        foreach($values as $value) {
            Tag::create([
                'name' => $value
            ]);
        }

        Post::all()->each(function(Post $post){
            $randIds = Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
            // [
            //  'id' => 1
            //  'id' => 2
            $post->tags()->attach($randIds); //[1,2,3]
        });
    }
}
