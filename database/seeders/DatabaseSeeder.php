<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(ColorSeeder::class);
        $this->call(ParametroSeeder::class);
        $this->call(FormasdeentregaSeeder::class);
        $this->call(FormasdepagoSeeder::class);
        $this->call(PresentacionSeeder::class);
        $this->call(TalleSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(UserSeeder::class);
        // \App\Models\Categoria::factory(15)->create();
    }
}
