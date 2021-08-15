<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Field;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $field = new Field;
        $field->field_name = 'Công nghệ';
        $field->save();

        $field = new Field;
        $field->field_name = 'Bất động sản';
        $field->save();
    }
}
