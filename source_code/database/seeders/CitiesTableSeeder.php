<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City;
        $city->city_name = 'Hà Nội';
        $city->total_companies = 1;
        $city->total_jobs = 5;
        $city->save();

        $city = new City;
        $city->city_name = 'TP Hồ Chí Minh';
        $city->save();

        $city = new City;
        $city->city_name = 'Đà Nẵng';
        $city->save();
    }
}
