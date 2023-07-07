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



    <!-- Lista elegi productos  -->

    <div class="flex overflow-x-auto space-x-8 w-full ">

        @if($destacados)
            @foreach ( $destacados as $destacado)
                <section class="flex-shrink-0 border-1 border-purple-300 p-4">
                    <img src="{{ asset('storage/productos/' . $destacado->file_path) }}" class=" h-60 w-60 rounded-md"
                        alt="">
                    <p class="text-2xl font-bold   m-2 p-2">{{ $destacado->nombre}}</p>
                    <p class="m-2 p-2">{{ $destacado->desCorta}}</p>
                </section>
            @endforeach
        @endif
    </div>




    <!-- Lista elegi productos  -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <ul class="stepper" data-mdb-stepper="stepper">
                    <li class="stepper-step stepper-active">
                        <div class="stepper-head">
                            <span class="stepper-head-icon"> 1 </span>
                            <span class="stepper-head-text"> Elegí productos </span>
                        </div>
                        <div class="stepper-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </div>
                    </li>
                    <li class="stepper-step">
                        <div class="stepper-head">
                            <span class="stepper-head-icon"> 2 </span>
                            <span class="stepper-head-text"> Completá tus datos </span>
                        </div>
                        <div class="stepper-content">
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </div>
                    </li>
                    <li class="stepper-step">
                        <div class="stepper-head">
                            <span class="stepper-head-icon"> 3 </span>
                            <span class="stepper-head-text"> Pagá y recibilo </span>
                        </div>
                        <div class="stepper-content">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur.
                        </div>
                    </li>
                </ul>



            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">




                <section class="mb-20 text-gray-700">
                    <div class="text-center md:max-w-xl lg:max-w-3xl mx-auto">
                        <h3 class="text-3xl font-bold mb-6 text-gray-800">Testimonios</h3>
                        <p class="mb-6 pb-2 md:mb-12 md:pb-0">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam
                            iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum
                            porro a pariatur veniam.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6 text-center">
                        <div>
                            <div class="block rounded-lg shadow-lg bg-white">
                                <div class="overflow-hidden rounded-t-lg h-28" style="background-color: #9d789b;">
                                </div>
                                <div
                                    class="w-24 -mt-12 overflow-hidden border border-2 border-white rounded-full mx-auto bg-white">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp" />
                                </div>
                                <div class="p-6">
                                    <h4 class="text-2xl font-semibold mb-4">Maria Smantha</h4>
                                    <hr />
                                    <p class="mt-4">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="quote-left" class="w-6 pr-2 inline-block" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
                                            </path>
                                        </svg>
                                        Lorem ipsum dolor sit amet eos adipisci, consectetur adipisicing elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="block rounded-lg shadow-lg bg-white">
                                <div class="overflow-hidden rounded-t-lg h-28" style="background-color: #7a81a8;">
                                </div>
                                <div
                                    class="w-24 -mt-12 overflow-hidden border border-2 border-white rounded-full mx-auto bg-white">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp" />
                                </div>
                                <div class="p-6">
                                    <h4 class="text-2xl font-semibold mb-4">Lisa Cudrow</h4>
                                    <hr />
                                    <p class="mt-4">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="quote-left" class="w-6 pr-2 inline-block" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
                                            </path>
                                        </svg>
                                        Neque cupiditate assumenda in maiores
                                        repudi mollitia architecto.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="block rounded-lg shadow-lg bg-white">
                                <div class="overflow-hidden rounded-t-lg h-28" style="background-color: #6d5b98;">
                                </div>
                                <div
                                    class="w-24 -mt-12 overflow-hidden border border-2 border-white rounded-full mx-auto bg-white">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp" />
                                </div>
                                <div class="p-6">
                                    <h4 class="text-2xl font-semibold mb-4">John Smith</h4>
                                    <hr />
                                    <p class="mt-4">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="quote-left" class="w-6 pr-2 inline-block" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z">
                                            </path>
                                        </svg>
                                        Delectus impedit saepe officiis ab
                                        aliquam repellat rem unde ducimus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>




            </div>
        </div>
    </div>


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
