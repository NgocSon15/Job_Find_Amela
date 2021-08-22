<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'name' => 'android',
            'description' => 'Đặt đường dẫn đến trang tải app android ở footer',
            'content' => 'https://play.google.com/',
        ]);
        DB::table('configs')->insert([
            'name' => 'ios',
            'description' => 'Đặt đường dẫn đến trang tải app ios ở footer',
            'content' => 'https://www.apple.com/app-store',
        ]);
    }
}
