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
        $city->save();

        $city = new City;
        $city->city_name = 'TP Hồ Chí Minh';
        $city->save();

        $city = new City;
        $city->city_name = 'Đà Nẵng';
        $city->save();
    }
}
