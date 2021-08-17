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
<<<<<<< HEAD
        $user = new User();
        $user->company_id = 1;
        $user->email = 'contact@amela.vn';
        $user->password = '12345678';
        $user->role = 'company';
        $user->save();
=======
        // $user = new User();
        // $user->username = 'amela';
        // $user->email = 'contact@amela.vn';
        // $user->password = '123456';
        // $user->role = 'company';
        // $user->save();
>>>>>>> dev
    }
}
