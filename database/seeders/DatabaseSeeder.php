<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', 'admin@trustartup.com')->count()){
            $user = new User;
            $user->name = 'Andrey';
            $user->surname = 'Kirillvanov';
            $user->password =  '$2y$10$ZoDRR7rJARH93cOw6tcQCegZWsXl4832j16vHhaXn6yWYhKwO2A9O';
            $user->email = 'admin@trustartup.com';
            $user->confirmed_at = Carbon::now();
            $user->save();
            $user->roles()->saveMany([
                new Role(['type' => 'CREATOR']),
                new Role(['type' => 'APPLICANT']),
                new Role(['type' => 'MODERATOR']),
            ]);
        }
    }
}
