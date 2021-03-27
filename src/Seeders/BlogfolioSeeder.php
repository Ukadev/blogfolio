<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(PostCategoriesTableSeeder::class);
         $this->call(PostTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
//         $this->call(RolesTableSeeder::class);
    }
}
