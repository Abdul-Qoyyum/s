<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  factory(App\User::class)->create();
        $user->posts()->saveMany(factory(App\Post::class,30)->make());
        foreach($user->posts as $post){
            $post->photo()->save(factory(App\Photo::class)->make());
        }
    }

}
