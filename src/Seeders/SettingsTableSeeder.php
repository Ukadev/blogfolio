<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(['key' => 'siteName', 'value' => 'Blogfolio']);
        DB::table('settings')->insert(['key' => 'siteTitle', 'value' => 'Blogfolio System']);
        DB::table('settings')->insert(['key' => 'siteLanguage', 'value' => 'en']);
        DB::table('settings')->insert(['key' => 'siteDescription', 'value' => 'Blogfolio: blog and portfolio system basen in Laravel 5.3']);
        DB::table('settings')->insert(['key' => 'siteComments', 'value' => 1]);
        DB::table('settings')->insert(['key' => 'disqusURL', 'value' => '']);
    }
}
