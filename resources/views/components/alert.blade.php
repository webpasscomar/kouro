@props(['title','type'])

@php

switch($type){
  case 'info':
    $clases = "bg-blue-100 border-blue-500 text-blue-700";
    break;

  case 'warning':
    $clases = "bg-orange-100 border-orange-500 text-orange-700";
    break;

  case 'danger':
    $clases = "bg-red-100 border-red-500 text-red-700";
    break;

  case 'success':
    $clases = "bg-green-100 border-green-500 text-green-700";
    break;    

  default:
    $clases = "bg-blue-100 border-blue-500 text-blue-700";
    break;
}

@endphp

<div class=" border-l-4 p-4 {{ $clases }}" role="alert">
  <p class="font-bold">{{ $title }}</p>
  {{ $slot }}
</div>