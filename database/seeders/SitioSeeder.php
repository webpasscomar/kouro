<?php

namespace Database\Seeders;

use App\Models\Sitio;
use Illuminate\Database\Seeder;

class SitioSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $sitio = new Sitio();
    $sitio->nombre = 'Nombre del sitio';
    $sitio->logo = 'logo.png';
    $sitio->url = 'misitio.com';
    $sitio->correo = 'micorreo@misitio.com';
    $sitio->razonSocial = 'El pulpo';
    $sitio->direccion = 'San Martín 451';
    $sitio->codigoPostal = '1653';
    $sitio->googleMap = '...';
    $sitio->googleAnalytics = '...';
    $sitio->icon = 'icon.png';
    $sitio->qr = 'qr.png';
    $sitio->instagram = 'https://instagram.com/misitio';
    $sitio->facebook = 'https://facebook.com/misitio';
    $sitio->twitter = 'https://twitter.com/misitio';
    $sitio->linkedin = 'https://www.linkedin.com/misitio';
    $sitio->youtube = 'https://www.youtube.com/misitio';
    $sitio->save();
  }
}
