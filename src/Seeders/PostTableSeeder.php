<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'Welcome to Blogfolio',
            'slug' => 'welcome-to-blogfolio',
            'content' => 'Hello and welcome to your blog and portfolio system.',
            'category_id' => 1
        ]);
    }
}
