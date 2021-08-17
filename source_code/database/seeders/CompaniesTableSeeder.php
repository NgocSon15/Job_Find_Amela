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
        $company->shortname = 'Amela';
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

        $company = new Company();
        $company->fullname = 'Công ty cổ phần CodeGym';
        $company->shortname = 'CodeGym';
        $company->tax_code = '1234567891';
        $company->company_code = 'COD020001';
        $company->email = 'codegym@example.com';
        $company->address = 'Hà Nội';
        $company->logo = 'images/logo-codegym.png';
        $company->description = 'Công ty cổ phần Code Gym';
        $company->phone = '1234567891';
        $company->total_jobs = 10;
        $company->timestamps = false;
        $company->save();

        $company = new Company();
        $company->fullname = 'Google LLC';
        $company->shortname = 'Google';
        $company->tax_code = '1234567892';
        $company->company_code = 'GOO030001';
        $company->email = 'google@example.com';
        $company->address = 'California';
        $company->logo = 'images/logo-google.png';
        $company->description = 'Google';
        $company->phone = '1234567892';
        $company->total_jobs = 15;
        $company->timestamps = false;
        $company->save();

        $company = new Company();
        $company->fullname = 'Apple Inc.';
        $company->shortname = 'Apple';
        $company->tax_code = '1234567893';
        $company->company_code = 'APP040001';
        $company->email = 'apple@example.com';
        $company->address = 'Mỹ';
        $company->logo = 'images/logo-apple.png';
        $company->description = 'Apple';
        $company->phone = '1234567893';
        $company->total_jobs = 7;
        $company->timestamps = false;
        $company->save();

        $company = new Company();
        $company->fullname = 'Samsung Electronics co. ltd';
        $company->shortname = 'Samsung';
        $company->tax_code = '1234567894';
        $company->company_code = 'SAM050001';
        $company->email = 'samsung@example.com';
        $company->address = 'Hàn Quốc';
        $company->logo = 'images/logo-samsung.jpg';
        $company->description = 'Samsung';
        $company->phone = '1234567894';
        $company->total_jobs = 12;
        $company->timestamps = false;
        $company->save();

        $company = new Company();
        $company->fullname = 'Tập đoàn viễn thông quân đội Viettel';
        $company->shortname = 'Viettel';
        $company->tax_code = '1234567895';
        $company->company_code = 'VIE060001';
        $company->email = 'viettel@example.com';
        $company->address = 'Việt Nam';
        $company->logo = 'images/logo-viettel.png';
        $company->description = 'Viettel';
        $company->phone = '1234567895';
        $company->total_jobs = 15;
        $company->timestamps = false;
        $company->save();

        $company = new Company();
        $company->fullname = 'Tập đoàn Vingroup';
        $company->shortname = 'Vingroup';
        $company->tax_code = '1234567896';
        $company->company_code = 'VIN070001';
        $company->email = 'vingroup@example.com';
        $company->address = 'Việt Nam';
        $company->logo = 'images/logo-vingroup.png';
        $company->description = 'Vingroup';
        $company->phone = '1234567896';
        $company->total_jobs = 12;
        $company->timestamps = false;
        $company->save();

        $company = new Company();
        $company->fullname = 'Công ty TNHH phần mềm FPT';
        $company->shortname = 'FPT Software';
        $company->tax_code = '1234567897';
        $company->company_code = 'FPT080001';
        $company->email = 'fsoft@example.com';
        $company->address = 'Việt Nam';
        $company->logo = 'images/logo-fpt.png';
        $company->description = 'FPT';
        $company->phone = '1234567897';
        $company->total_jobs = 6;
        $company->timestamps = false;
        $company->save();
    }
}
