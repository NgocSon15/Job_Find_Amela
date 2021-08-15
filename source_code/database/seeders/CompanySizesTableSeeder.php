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
        $companySize = new CompanySize();
        $companySize->size = '20 - 50';
        $companySize->timestamps = false;
        $companySize->save();

        $companySize = new CompanySize();
        $companySize->size = '51 - 100';
        $companySize->timestamps = false;
        $companySize->save();

        $companySize = new CompanySize();
        $companySize->size = '101 - 150';
        $companySize->timestamps = false;
        $companySize->save();

        $companySize = new CompanySize();
        $companySize->size = '151 - 200';
        $companySize->timestamps = false;
        $companySize->save();

        $companySize = new CompanySize();
        $companySize->size = '201 - 250';
        $companySize->timestamps = false;
        $companySize->save();

        $companySize = new CompanySize();
        $companySize->size = '251 - 300';
        $companySize->timestamps = false;
        $companySize->save();
    }
}
