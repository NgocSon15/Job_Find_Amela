<?php

namespace Database\Seeders;

use App\Models\CompanySize;
use Illuminate\Database\Seeder;

class CompanySizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = new CompanySize;
        $size->size = ' < 20';
        $size->save();

        $size = new CompanySize;
        $size->size = '20 - 99';
        $size->save();

        $size = new CompanySize;
        $size->size = '100 - 199';
        $size->save();

        $size = new CompanySize;
        $size->size = '200 - 299';
        $size->save();

        $size = new CompanySize;
        $size->size = '300 - 499';
        $size->save();
    }
}
