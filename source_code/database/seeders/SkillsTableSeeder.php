<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = new Skill();
        $skill->skill = 'PHP';
        $skill->count = 10;
        $skill->timestamps = false;
        $skill->save();

        $skill = new Skill();
        $skill->skill = 'Java';
        $skill->count = 10;
        $skill->timestamps = false;
        $skill->save();

        $skill = new Skill();
        $skill->skill = 'NodeJS';
        $skill->count = 10;
        $skill->timestamps = false;
        $skill->save();
    }
}
