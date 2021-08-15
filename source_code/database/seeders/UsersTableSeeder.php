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
        $user->username = 'amela';
        $user->email = 'contact@amela.vn';
        $user->password = '123456';
        $user->role = 'company';
        $user->save();
    }
}
