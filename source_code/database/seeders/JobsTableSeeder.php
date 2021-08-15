<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
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
        $job->job_title = 'PHP Intern';
        $job->job_description = 'Tuyển thực tập sinh PHP';
        $job->skill_id = 1;
        $job->job_code = 'AME01000101';
        $job->category_id = 1;
        $job->min_salary = 1000000;
        $job->max_salary = 3000000;
        $job->work_location = 'Nam Từ Liêm, Hà Nội';
        $job->job_type = 0;
        $job->experiences = 0;
        $job->expiration = '2021-08-30';
        $job->position_id = 1;
        $job->gender = 1;
        $job->quantity = 10;
        $job->status = 0;
        $job->is_hot = 1;
        $job->is_suggest = 1;
        $job->view = 0;
        $job->reference_ids = '2 3 4 5';
        $job->save();

        $job = new Job();
        $job->company_id = 1;
        $job->job_title = 'Java Intern';
        $job->job_description = 'Tuyển thực tập sinh Java';
        $job->skill_id = 2;
        $job->job_code = 'AME01000102';
        $job->category_id = 1;
        $job->min_salary = 1000000;
        $job->max_salary = 3000000;
        $job->work_location = 'Nam Từ Liêm, Hà Nội';
        $job->job_type = 0;
        $job->experiences = 0;
        $job->expiration = '2021-08-30';
        $job->position_id = 1;
        $job->gender = 1;
        $job->quantity = 10;
        $job->status = 0;
        $job->is_hot = 1;
        $job->is_suggest = 1;
        $job->view = 0;
        $job->reference_ids = '1 3 4 5';
        $job->save();

        $job = new Job();
        $job->company_id = 1;
        $job->job_title = 'NodeJS Intern';
        $job->job_description = 'Tuyển thực tập sinh NodeJS';
        $job->skill_id = 3;
        $job->job_code = 'AME01000103';
        $job->category_id = 1;
        $job->min_salary = 1000000;
        $job->max_salary = 3000000;
        $job->work_location = 'Nam Từ Liêm, Hà Nội';
        $job->job_type = 0;
        $job->experiences = 0;
        $job->expiration = '2021-08-30';
        $job->position_id = 1;
        $job->gender = 1;
        $job->quantity = 10;
        $job->status = 0;
        $job->is_hot = 1;
        $job->is_suggest = 1;
        $job->view = 0;
        $job->reference_ids = '1 2 4 5';
        $job->save();

        $job = new Job();
        $job->company_id = 1;
        $job->job_title = 'PHP Developer';
        $job->job_description = 'Tuyển lập trình viên PHP';
        $job->skill_id = 1;
        $job->job_code = 'AME01000104';
        $job->category_id = 1;
        $job->min_salary = 7000000;
        $job->max_salary = 10000000;
        $job->work_location = 'Nam Từ Liêm, Hà Nội';
        $job->job_type = 1;
        $job->experiences = 1;
        $job->expiration = '2021-08-30';
        $job->position_id = 2;
        $job->gender = 1;
        $job->quantity = 10;
        $job->status = 0;
        $job->is_hot = 1;
        $job->is_suggest = 1;
        $job->view = 0;
        $job->reference_ids = '1 2 3 5';
        $job->save();

        $job = new Job();
        $job->company_id = 1;
        $job->job_title = 'Java Developer';
        $job->job_description = 'Tuyển lập trình viên Java';
        $job->skill_id = 2;
        $job->job_code = 'AME01000105';
        $job->category_id = 1;
        $job->min_salary = 7000000;
        $job->max_salary = 10000000;
        $job->work_location = 'Nam Từ Liêm, Hà Nội';
        $job->job_type = 1;
        $job->experiences = 1;
        $job->expiration = '2021-08-30';
        $job->position_id = 2;
        $job->gender = 1;
        $job->quantity = 10;
        $job->status = 0;
        $job->is_hot = 1;
        $job->is_suggest = 1;
        $job->view = 0;
        $job->reference_ids = '1 2 3 4';
        $job->save();
    }
}
