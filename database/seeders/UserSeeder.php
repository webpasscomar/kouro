<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->name = 'Admin';
        $user->email = 'info@webpass.com.ar';
        $user->password = Hash::make('admin');
        $user->current_team_id = 1;

        $user->save();
    }
}
