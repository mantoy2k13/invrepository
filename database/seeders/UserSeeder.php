<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PersonalInformation;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Insert to User
        $user           = new User;
        $user->username = "jake";
        $user->email    = "jake@trouble-free-employees.com";
        $user->password = \Hash::make("Jakeisawesome@2021!");
        $user->role     = 'admin';
        $user->save();

        // Insert to Personal Information
        $info             = new PersonalInformation;
        $info->user_id    = $user->id;
        $info->first_name = "Jake";
        $info->last_name  = "Barefoot";
        $info->nickname   = "Jake";
        $info->save();
    }
}
