<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt(123456)
        ]);

        factory(\App\Post::class, 50)->create();
        factory(\App\Tag::class, 8)->create();

        for($p=50; $p > 1; $p--) {
            \DB::table('tag_post')->insert(['tag_id' => array_random([1,2,3,4,5,6,7,8]), 'post_id' => $p]);
        }
    }
}
