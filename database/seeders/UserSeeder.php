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
        $user->password = '$2y$10$DcYmWrG1JuKixJ67ofMS2epi2gVBM3ngt5Lg0e3E9jNjWYJo1fj8u';
        $user->current_team_id = 1;

        $user->save();
    }
}
