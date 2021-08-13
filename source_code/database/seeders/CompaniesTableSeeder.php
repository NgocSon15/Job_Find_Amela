<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company->user_id = 1;
        $company->fullname = 'Amela Technology';
        $company->email = 'contact@amela.vn';
        $company->employee = 200;
        $company->website = 'amela.vn';
        $company->phone = '(+84) 963 336 334';
        $company->status = 0;
        $company->is_suggest = 1;
        $company->save();
    }
}
