<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->city_name = 'Hà Nội';
        $city->total_companies = 1;
        $city->total_jobs = 5;
        $city->save();
    }
}
