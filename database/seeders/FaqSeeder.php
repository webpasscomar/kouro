<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $f = new Faq();
    $f->pregunta = '¿Es ésta la pregunta número 1?';
    $f->respuesta = 'Si, efectivamente es la pregunta número 1 y en consecuencia ésta es la respuesta a dicha pregunta.';
    $f->save();

    $f2 = new Faq();
    $f2->pregunta = '¿Es ésta la pregunta número 2?';
    $f2->respuesta = 'Si, efectivamente es la pregunta número 2 y en consecuencia ésta es la respuesta a dicha pregunta.';
    $f2->save();
  }
}
