<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->company_id = 1;
        $user->email = 'contact@amela.vn';
        $user->fullname = 'Amela';
        $user->password = '12345678';
        $user->role = 'company';
        $user->save();

    }
}
