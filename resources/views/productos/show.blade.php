<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Detalle del producto: {{ $producto->nombre }}
    </h2>
  </x-slot>




  <div class="container">
    <div class="row">
      {{-- Sección principal --}}
      <div class="col-md-9">
        <h2>Cuerpo principal</h2>
      </div>

      {{-- Sidebar derecha --}}
      <div class="col-md-3">
        <h2>Sidebar</h2>
        @include('productos.sidebar')
      </div>
    </div>
  </div>






  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

        <div class="bg-white">
          <div class="pt-6">


            <nav aria-label="Breadcrumb">
              <ol role="list"
                class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                  <div class="flex items-center">
                    <a href="#" class="mr-2 text-sm font-medium text-gray-900">Men</a>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-4 text-gray-300">
                      <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                    </svg>
                  </div>
                </li>

                <li>
                  <div class="flex items-center">
                    <a href="{{ route('productos.categoria', $categoria) }}"
                      class="mr-2 text-sm font-medium text-gray-900">{{ $categoria->categoria }}</a>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-4 text-gray-300">
                      <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                    </svg>
                  </div>
                </li>

                <li class="text-sm">
                  <a href="#" aria-current="page"
                    class="font-medium text-gray-500 hover:text-gray-600">{{ $producto->nombre }}</a>
                </li>
              </ol>
            </nav>

            <div class="grid grid-cols-1 sm:grid-cols-4">
              <div class="grid col-span-3">


                <!-- Product info -->
                <div
                  class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
                  <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <picture>
                      <source srcset="{{ asset('storage/productos/' . $producto->id . '.webp') }}" type="image/webp">
                      <img alt="{{ $producto->nombre }}"
                        src="{{ asset('storage/productos/' . $producto->id . '.jpg') }}"
                        class="object-cover object-center group-hover:opacity-75">
                    </picture>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                      {{ $producto->nombre }}
                    </h1>
                  </div>

                  <!-- Options -->
                  <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight text-gray-900">$ {{ $producto->precioLista }}
                    </p>

                    <!-- Reviews -->
                    <div class="mt-6">
                      <h3 class="sr-only">Reviews</h3>
                      <div class="flex items-center">
                        <div class="flex items-center">

                          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                              clip-rule="evenodd" />
                          </svg>

                          <!-- Heroicon name: mini/star -->
                          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                              clip-rule="evenodd" />
                          </svg>

                          <!-- Heroicon name: mini/star -->
                          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                              clip-rule="evenodd" />
                          </svg>

                          <!-- Heroicon name: mini/star -->
                          <svg class="text-gray-900 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                              clip-rule="evenodd" />
                          </svg>

                          <!-- Heroicon name: mini/star -->
                          <svg class="text-gray-200 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                              clip-rule="evenodd" />
                          </svg>
                        </div>
                        <p class="sr-only">4 out of 5 stars</p>
                        <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117
                          reviews</a>
                      </div>
                    </div>

                    <form class="mt-10">
                      <!-- Colors -->
                      <div>
                        <h3 class="text-sm font-medium text-gray-900">Color</h3>

                        <fieldset class="mt-4">
                          <legend class="sr-only">Choose a color</legend>
                          <div class="flex items-center space-x-3">

                            <label
                              class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                              <input type="radio" name="color-choice" value="White" class="sr-only"
                                aria-labelledby="color-choice-0-label">
                              <span id="color-choice-0-label" class="sr-only"> White
                              </span>
                              <span aria-hidden="true"
                                class="h-8 w-8 bg-white border border-black border-opacity-10 rounded-full"></span>
                            </label>

                            <label
                              class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                              <input type="radio" name="color-choice" value="Gray" class="sr-only"
                                aria-labelledby="color-choice-1-label">
                              <span id="color-choice-1-label" class="sr-only"> Gray
                              </span>
                              <span aria-hidden="true"
                                class="h-8 w-8 bg-gray-200 border border-black border-opacity-10 rounded-full"></span>
                            </label>

                            <label
                              class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-900">
                              <input type="radio" name="color-choice" value="Black" class="sr-only"
                                aria-labelledby="color-choice-2-label">
                              <span id="color-choice-2-label" class="sr-only"> Black
                              </span>
                              <span aria-hidden="true"
                                class="h-8 w-8 bg-gray-900 border border-black border-opacity-10 rounded-full"></span>
                            </label>
                          </div>
                        </fieldset>
                      </div>

                      <!-- Sizes -->
                      <div class="mt-10">
                        <div class="flex items-center justify-between">
                          <h3 class="text-sm font-medium text-gray-900">Size</h3>
                          <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size
                            guide</a>
                        </div>

                        <fieldset class="mt-4">
                          <legend class="sr-only">Choose a size</legend>
                          <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                            <!-- Active: "ring-2 ring-indigo-500" -->
                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-gray-50 text-gray-200 cursor-not-allowed">
                              <input type="radio" name="size-choice" value="XXS" disabled class="sr-only"
                                aria-labelledby="size-choice-0-label">
                              <span id="size-choice-0-label">XXS</span>

                              <span aria-hidden="true"
                                class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                                <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200"
                                  viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                  <line x1="0" y1="100" x2="100" y2="0"
                                    vector-effect="non-scaling-stroke" />
                                </svg>
                              </span>
                            </label>

                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                              <input type="radio" name="size-choice" value="XS" class="sr-only"
                                aria-labelledby="size-choice-1-label">
                              <span id="size-choice-1-label">XS</span>

                              <span class="pointer-events-none absolute -inset-px rounded-md"
                                aria-hidden="true"></span>
                            </label>

                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                              <input type="radio" name="size-choice" value="S" class="sr-only"
                                aria-labelledby="size-choice-2-label">
                              <span id="size-choice-2-label">S</span>

                              <span class="pointer-events-none absolute -inset-px rounded-md"
                                aria-hidden="true"></span>
                            </label>

                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                              <input type="radio" name="size-choice" value="M" class="sr-only"
                                aria-labelledby="size-choice-3-label">
                              <span id="size-choice-3-label">M</span>

                              <span class="pointer-events-none absolute -inset-px rounded-md"
                                aria-hidden="true"></span>
                            </label>

                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                              <input type="radio" name="size-choice" value="L" class="sr-only"
                                aria-labelledby="size-choice-4-label">
                              <span id="size-choice-4-label">L</span>

                              <span class="pointer-events-none absolute -inset-px rounded-md"
                                aria-hidden="true"></span>
                            </label>

                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                              <input type="radio" name="size-choice" value="XL" class="sr-only"
                                aria-labelledby="size-choice-5-label">
                              <span id="size-choice-5-label">XL</span>

                              <span class="pointer-events-none absolute -inset-px rounded-md"
                                aria-hidden="true"></span>
                            </label>

                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                              <input type="radio" name="size-choice" value="2XL" class="sr-only"
                                aria-labelledby="size-choice-6-label">
                              <span id="size-choice-6-label">2XL</span>

                              <span class="pointer-events-none absolute -inset-px rounded-md"
                                aria-hidden="true"></span>
                            </label>

                            <label
                              class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 bg-white shadow-sm text-gray-900 cursor-pointer">
                              <input type="radio" name="size-choice" value="3XL" class="sr-only"
                                aria-labelledby="size-choice-7-label">
                              <span id="size-choice-7-label">3XL</span>

                              <span class="pointer-events-none absolute -inset-px rounded-md"
                                aria-hidden="true"></span>
                            </label>
                          </div>
                        </fieldset>
                      </div>

                      <button type="submit"
                        class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Agregar
                        al carrito</button>
                    </form>
                  </div>

                  <div
                    class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pb-16 lg:pr-8">
                    <!-- Description and details -->
                    <div>
                      <h3 class="sr-only">Descripción</h3>

                      <div class="space-y-6">
                        <p class="text-base text-gray-900">{{ $producto->desCorta }}</p>
                      </div>
                    </div>


                    <div class="mt-10">
                      <h2 class="text-sm font-medium text-gray-900">Detalles</h2>

                      <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">{{ $producto->descLarga }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>




              </div>


              <div class="grid grid-cols-1">
                <h3 class="block px-2 py-3 bg-gray-300">JAJA Otras categorias</h3>

                <ul>
                  @foreach ($categorias as $categoria)
                    <li class="mb-2">
                      <i class="fa fa-caret-right" aria-hidden="true"></i>
                      <a href="{{ route('productos.categoria', $categoria['slug']) }}"
                        class="text-red-700 hover:text-red-400">
                        {{ $categoria['categoria'] }}</a>
                      @if ($categoria->hijas->count() > 0)
                        @include('productos.partials_categorias', [
                            'categorias' => $categoria->hijas,
                        ])
                      @endif
                    </li>
                  @endforeach
                </ul>


              </div>


            </div>

          </div>
        </div>


      </div>
    </div>
  </div>

</x-app-layout>
