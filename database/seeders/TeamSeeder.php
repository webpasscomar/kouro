<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = new Team();
        $team->user_id = 1;
        $team->name = 'Admin Team';
        $team->personal_team = 1;
        $team->save();
    }
}
