<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanySize;

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
        $size->size = ' < 20 nhân viên';
        $size->save();

        $size = new CompanySize;
        $size->size = '20 - 99 nhân viên';
        $size->save();

        $size = new CompanySize;
        $size->size = '100 - 199 nhân viên';
        $size->save();

        $size = new CompanySize;
        $size->size = '200 - 299 nhân viên';
        $size->save();

        $size = new CompanySize;
        $size->size = '300 - 499 nhân viên';
        $size->save();
    }
}
