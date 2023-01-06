<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}


    <div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel">
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner relative w-full overflow-hidden">
            <div class="carousel-item active relative float-left w-full">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" class="block w-full"
                    alt="..." />
                <div class="carousel-caption hidden md:block absolute text-center">
                    <h5 class="text-xl">First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item relative float-left w-full">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(22).jpg" class="block w-full"
                    alt="..." />
                <div class="carousel-caption hidden md:block absolute text-center">
                    <h5 class="text-xl">Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item relative float-left w-full">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).jpg" class="block w-full"
                    alt="..." />
                <div class="carousel-caption hidden md:block absolute text-center">
                    <h5 class="text-xl">Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button
            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
            type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
            type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>







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
                                <div class="overflow-hidden rounded-t-lg h-28" style="background-color: #9d789b;"></div>
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
                                <div class="overflow-hidden rounded-t-lg h-28" style="background-color: #7a81a8;"></div>
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


</x-app-layout>
