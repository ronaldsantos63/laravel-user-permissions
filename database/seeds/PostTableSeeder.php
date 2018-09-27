<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all();
        factory(\App\Post::class, 20)
            ->make()
            ->each(function ($post) use ($users){
                $user = $users->random();
                $post->user_id = $user->id;
                $post->save();
            });
    }
}
