<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->cat_name = 'IT';
        $category->icon = 'flaticon-high-tech';
        $category->total_jobs = 21;
        $category->save();

        $category = new Category();
        $category->cat_name = 'Design & Development';
        $category->icon = 'flaticon-cms';
        $category->total_jobs = 2;
        $category->save();

        $category = new Category();
        $category->cat_name = 'Design & Creative';
        $category->icon = 'flaticon-tour';
        $category->total_jobs = 2;
        $category->save();

        $category = new Category();
        $category->cat_name = 'Sales & Marketing';
        $category->icon = 'flaticon-report';
        $category->total_jobs = 2;
        $category->save();
    }
}
