<?php
namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(FieldsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
//        $this->call(CategoriesTableSeeder::class);
//        $this->call(CitiesTableSeeder::class);
//        $this->call(CompanySizesTableSeeder::class);
//        $this->call(PositionsTableSeeder::class);
//        $this->call(SkillsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
    }
}



