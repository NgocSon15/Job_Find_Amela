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
        $company->fullname = 'Amela Technology';
        $company->tax_code = '1234567890';
        $company->company_code = 'AME010001';
        $company->email = 'contact@amela.vn';
        $company->address = 'Tầng 5, Tháp A, Toà Keangnam, Khu Đô thị mới E6 Cầu Giấy, Phạm Hùng, Mễ Trì, Nam Từ Liêm, Hà Nội';
        $company->map = 'https://www.google.com/maps/place/C%C3%B4ng+Ty+C%E1%BB%95+Ph%E1%BA%A7n+C%C3%B4ng+Ngh%E1%BB%87+Amela+Vi%E1%BB%87t+Nam/@21.0186777,105.7838098,17z/data=!4m5!3m4!1s0x3135ab476d5943cf:0x16f301ad14075d03!8m2!3d21.0183117!4d105.7840876?hl=vi-VN';
        $company->logo = 'images/logo-amela.png';
        $company->field_id = 1;
        $company->description = 'AMELA Technology JSC là doanh nghiệp cung cấp các dịch vụ phát triển phần mềm và CNTT có trụ sở chính tại Hà Nội, được thành lập từ năm 2019.';
        $company->city_id = 1;
        $company->size_id = 5;
        $company->website = 'amela.vn';
        $company->phone = '(+84) 963 336 334';
        $company->status = 0;
        $company->total_jobs = 5;
        $company->total_employee = 50;
        $company->is_suggest = 1;
        $company->timestamps = false;
        $company->save();
    }
}
