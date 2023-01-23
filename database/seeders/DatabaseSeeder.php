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
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(Producto_categoriaSeeder::class);
        $this->call(SkuSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(SitioSeeder::class);
        $this->call(TipomovimientoSeeder::class);
        // \App\Models\Categoria::factory(15)->create();
    }
}
