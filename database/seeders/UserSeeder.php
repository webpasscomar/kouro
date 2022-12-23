<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        $user->password = '$2y$10$j/R3aMZe5I3ReVzecEol4.xVW0xMfFWU/VR0CqFEW48lGuGFKrVTO';
        $user->current_team_id = 1;

        $user->save();
    }
}
