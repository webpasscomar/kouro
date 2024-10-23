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
    $f->question = '¿Es ésta la pregunta número 1?';
    $f->answer = 'Si, efectivamente es la pregunta número 1 y en consecuencia ésta es la respuesta a dicha pregunta.';
    $f->status = 1;
    $f->save();

    $f2 = new Faq();
    $f2->question = '¿Es ésta la pregunta número 2?';
    $f2->answer = 'Si, efectivamente es la pregunta número 2 y en consecuencia ésta es la respuesta a dicha pregunta.';
    $f2->status = 1;
    $f2->save();
  }
}
