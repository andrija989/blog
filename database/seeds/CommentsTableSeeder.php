<?php

use App\Post;
use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::all()->each(function(Post $post){
            $post->comments()->saveMany(factory(Comment::class, 5)->make());
        });
    }
}
