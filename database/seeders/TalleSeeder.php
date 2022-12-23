<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Talle;

class TalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $talle = new Talle();
        $talle->talle = 'S';
        $talle->estado = 1;
        $talle->save();

        $talle1 = new Talle();
        $talle1->talle = 'M';
        $talle1->estado = 1;
        $talle1->save();

        $talle2 = new Talle();
        $talle2->talle = 'L';
        $talle2->estado = 1;
        $talle2->save();

        $talle3 = new Talle();
        $talle3->talle = 'XL';
        $talle3->estado = 1;
        $talle3->save();

        $talle4 = new Talle();
        $talle4->talle = '37';
        $talle4->estado = 1;
        $talle4->save();

        $talle5 = new Talle();
        $talle5->talle = '38';
        $talle5->estado = 1;
        $talle5->save();

        $talle6 = new Talle();
        $talle6->talle = '39';
        $talle6->estado = 1;
        $talle6->save();

        $talle7 = new Talle();
        $talle7->talle = '40';
        $talle7->estado = 1;
        $talle7->save();

        $talle8 = new Talle();
        $talle8->talle = '2';
        $talle8->estado = 0;
        $talle8->save();

        $talle9 = new Talle();
        $talle9->talle = '4';
        $talle9->estado = 0;
        $talle9->save();

        $talle10 = new Talle();
        $talle10->talle = '6';
        $talle10->estado = 0;
        $talle10->save();

        $talle11 = new Talle();
        $talle11->talle = '8';
        $talle11->estado = 0;
        $talle11->save();

        $talle12 = new Talle();
        $talle12->talle = '10';
        $talle12->estado = 0;
        $talle12->save();

        $talle13 = new Talle();
        $talle13->talle = '12';
        $talle13->estado = 0;
        $talle13->save();
    }
}
