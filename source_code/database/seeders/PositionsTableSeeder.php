<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = new Position();
        $position->position_name = 'Thực tập sinh';
        $position->timestamps = false;
        $position->save();

        $position = new Position();
        $position->position_name = 'Nhân viên';
        $position->timestamps = false;
        $position->save();
    }
}
