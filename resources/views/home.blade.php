<x-app-layout>

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


    {{-- ======================================================== --}}




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($categorias as $category)
                    <a href="{{ route('productos.categoria', $category->slug) }}">
                        <div class="relative overflow-hidden rounded-lg shadow-lg">

                            @if (Storage::disk('public')->exists('categorias/' . $category->imagen))
                                <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                                    src="{{ asset('storage/categorias/' . $category->imagen) }}"
                                    alt="{{ $category->categoria }}">
                            @else
                                <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-500 ease-in-out"
                                    src="{{ asset('storage/categorias/no_disponible.jpg') }}"
                                    alt="Imagen no disponible">
                            @endif


                            <div class="absolute bottom-0 left-0 right-0 px-4 py-2 bg-white bg-opacity-75">
                                <h2 class="text-lg font-bold">{{ $category->categoria }}</h2>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>


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
