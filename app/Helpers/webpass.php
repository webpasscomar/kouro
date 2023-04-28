<?php

function hola()
{
  echo "Hola mundo";
}

function parametro($id)
{
  $parametro = DB::table('parametros')->find($id);
  return $parametro->valor;
}

function setting()
{
  $setting = DB::table('sitio')->get();
  return $setting;
}




