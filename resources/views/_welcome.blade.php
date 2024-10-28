<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
    </h2>
    </x-slot> --}}

    <!-- Carousel tw-elements -->

    <div id="carouselDarkVariant" class="relative" data-te-carousel-init data-te-carousel-slide>
        <!-- Carousel indicators -->
        <div class="absolute inset-x-0 bottom-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
            data-te-carousel-indicators>
            @if ($slider)
                @foreach ($slider as $foto)
                    @if ($loop->first)
                        <button data-te-target="#carouselDarkVariant" data-te-slide-to="{{ $loop->index }}"
                            data-te-carousel-active
                            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none hover:bg-blue-700"
                            aria-current="true" aria-label="{{ $foto->nombre }}"></button>
                    @else
                        <button data-te-target="#carouselDarkVariant"
                            class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-black bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none hover:bg-blue-700"
                            data-te-slide-to="{{ $loop->index }}" aria-label=" {{ $foto->nombre }}"></button>
                    @endif
                @endforeach
            @endif
        </div>

        <!-- Carousel items -->
        <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">

            @if ($slider)
                @foreach ($slider as $foto)
                    @if ($loop->first)
                        <div class="relative float-left -mr-[100%] w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                            data-te-carousel-fade data-te-carousel-item data-te-carousel-active>
                            <img src="{{ asset('storage/galeria/' . $foto->imagen) }}" class="block w-full"
                                alt="{{ $foto->nombre }}" />
                        </div>
                    @else
                        <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                            data-te-carousel-fade data-te-carousel-item>
                            <img src="{{ asset('storage/galeria/' . $foto->imagen) }}" class="block w-full"
                                alt="{{ $foto->nombre }}" />
                        </div>
                    @endif
                @endforeach

            @endif

        </div>

        <!-- Carousel controls - prev item-->
        <button
            class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-25 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button" data-te-target="#carouselDarkVariant" data-te-slide="prev">
            <span class="inline-block h-10 w-8 dark:grayscale">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-10 w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
        </button>
        <!-- Carousel controls - next item-->
        <button
            class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-25 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button" data-te-target="#carouselDarkVariant" data-te-slide="next">
            <span class="inline-block h-10 w-8 dark:grayscale">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-10 w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
        </button>
    </div>

    {{-- ========================================================== --}}
    {{-- TODO:Eliminar si funciona lista elegi productos nueva --}}
    <!-- Lista elegi productos  -->

    {{-- <div class="flex overflow-x-auto space-x-8 w-full ">

        @if ($destacados)
            @foreach ($destacados as $destacado)
                <section class="flex-shrink-0 border-1 border-purple-300 p-4">
                    <img src="{{ asset('storage/productos/' . $destacado->file_path) }}" class=" h-60 w-60 rounded-md"
                        alt="">
                    <p class="text-2xl font-bold   m-2 p-2">{{ $destacado->nombre }}</p>
                    <p class="m-2 p-2">{{ $destacado->desCorta }}</p>
                </section>
            @endforeach
        @endif
    </div> --}}

    {{-- ======================================================== --}}

    <!-- Lista elegi productos  -->

    <section id="seccion-slice" class="flex relative items-center mt-10 mb-10">
        {{-- icono flecha izquiera --}}
        <button id="btn-slice-destacados-prev" class="absolute left-1 z-10" role="button">
            <span class="inline-block h-10 w-8 dark:grayscale">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-10 w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
        </button>
        {{-- icono flecha derecha --}}
        <button id="btn-slice-destacados-next" role="button" class="absolute hidden z-10 right-1 self-center">
            <span class="inline-block h-10 w-8 dark:grayscale rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="h-10 w-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
        </button>
        {{-- Contenedor de slice de imágenes --}}
        <div id="contenedor-slice-destacados" class="flex w-full gap-y-3 p-2 overflow-x-hidden gap-x-9 scroll-smooth">
            {{-- items imágenes --}}
            @if ($destacados)
                @foreach ($destacados as $destacado)
                    <section class="bg-[#e4e4e4] min-w-[310px] max-w-[310px] rounded-md shadow-gray-400 shadow-md">
                        <div class="w-full box-border p-5 drop-shadow-md">
                            <img src="{{ asset('storage/productos/' . $destacado->file_path) }}"
                                class="w-auto object-contain" alt="productos">
                        </div>
                        <div class="w-auto -mt-2 p-3 box-border">
                            <p class="text-2xl font-bold mb-2">{{ $destacado->nombre }}</p>
                            <p>{{ $destacado->desCorta }}</p>
                        </div>
                    </section>
                @endforeach
            @endif
        </div>
    </section>





    {{-- Estilos   --}}
    <style>
        .overflow-x-auto::-webkit-scrollbar {
            height: 0.5rem;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 9999px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 9999px;
        }
    </style>


</x-app-layout>
