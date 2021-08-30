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
        $user->company_id = 0;
        $user->email = 'admin@example.com';
        $user->fullname = 'Admin';
        $user->password = '25d55ad283aa400af464c76d713c07ad';
        $user->role = 'admin';
        $user->save();

    }
}
