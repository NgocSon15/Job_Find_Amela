<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = new Job();
        $job->company_id = 1;
        $job->job_tile = 'PHP Intern';
        $job->job_description = 'Tuyển thực tập sinh PHP';
        $job->category_id = 1;
        $job->min_salary = 1000000;
        $job->max_salary = 3000000;
        $job->work_location = 'Tầng 5, Tháp A, Toà Keangnam, Khu Đô thị mới E6 Cầu Giấy, Phạm Hùng, Mễ Trì, Nam Từ Liêm, Hà Nội';
        $job->job_level = 'Intern';
        $job->experiences = '0';
        $job->expiration = '2021-08-30';
    }
}
