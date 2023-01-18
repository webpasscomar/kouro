<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} | {{ date('d-m-Y', time()) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <table class="w-full border">
                    <thead>
                        <tr>
                            <th class="px-2 py-2 border bg-gray-300">9/1 al 13/1</th>
                            <th class="px-2 py-2 border">16/1 al 20/1</th>
                            <th class="px-2 py-2 border">23/1 al 27/1</th>
                            <th class="px-2 py-2 border">30/1 al 3/2</th>
                            <th class="px-2 py-2 border">6/2 al 10/2</th>
                            <th class="px-2 py-2 border">13/2 al 17/2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/edu.jpg') }}"
                                        alt="Edu">
                                    <span class="py-2"><a href="{{ route('testimonios') }}"> Bk-
                                            Testimonios</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/kari.jpg') }}"
                                        alt="Kari">
                                    <span class="py-2"><a href="{{ route('faqs') }}"> Bk- FAQs</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/kari.jpg') }}"
                                        alt="Kari">
                                    <span class="py-2"><a href="{{ route('colores') }}"> Bk- Colores</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/edu.jpg') }}"
                                        alt="Edu">
                                    <span class="py-2"><a href="{{ route('productos') }}"> Bk-
                                            productos</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/edu.jpg') }}"
                                        alt="Edu">
                                    <span class="py-2"><a href="{{ route('categorias') }}"> Bk-
                                            Categorias</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/quien.jpg') }}"
                                        alt="Quien?">
                                    <span class="py-2"><a href="{{ route('productos.index') }}"> Ft-
                                            Categorias</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/kari.jpg') }}"
                                        alt="Kari">
                                    <span class="py-2"><a href="{{ route('talles') }}"> Bk- talles</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/edu.jpg') }}"
                                        alt="Edu">
                                    <span class="py-2"><a href="{{ route('productos') }}"> Bk-
                                            Prod. Img-Color</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/edu.jpg') }}"
                                        alt="Edu">
                                    <span class="py-2"><a href="{{ route('sitio') }}"> Bk-
                                            sitio</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/quien.jpg') }}"
                                        alt="Quien?">
                                    <span class="py-2"><a href="shop/1"> Ft-
                                            Productos</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/kari.jpg') }}"
                                        alt="Kari">
                                    <span class="py-2"><a href="{{ route('presentaciones') }}"> Bk-
                                            presentaciones</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/quien.jpg') }}"
                                        alt="Quien?">
                                    <span class="py-2"><a href="shop/1/1"> Ft-
                                            Detalle Prod</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/edu.jpg') }}"
                                        alt="Edu">
                                    <span class="py-2"><a href="{{ route('parametros') }}"> Bk-
                                            parametros</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/quien.jpg') }}"
                                        alt="Quien?">
                                    <span class="py-2"><a href="shop/1/1"> Ft-
                                            Faqs</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="px-2 py-2 border bg-green-500">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/kari.jpg') }}"
                                        alt="Kari">
                                    <span class="py-2"><a href="{{ route('formasdeentrega') }}"> Bk- formas de
                                            entrega</a></span>
                                </div>
                            </td>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/quien.jpg') }}"
                                        alt="Quien?">
                                    <span class="py-2"><a href="shop/1/1"> Ft-
                                            Testimonios</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/quien.jpg') }}"
                                        alt="Quien?">
                                    <span class="py-2"><a href="shop/1/1">Bk-
                                            Stock, ing y egr</a></span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="px-2 py-2 border">
                                <div class="inline-flex">
                                    <img class="h-10 w-10 rounded-full mr-2" src="{{ asset('storage/quien.jpg') }}"
                                        alt="Quien?">
                                    <span class="py-2"><a href="shop/1/1"> Bk-
                                            Stock vista</a></span>
                                </div>
                            </td>
                            <td><a href="{{ route('dashboard') }}">Pedidos (Falta)</a></td>
                            <td><a href="{{ route('dashboard') }}">Stock (Falta)</a></td>
                            <td><a href="{{ route('dashboard') }}">Movimientos de Stock (Falta)</a></td>
                            <td>
                                <a href="{{ route('talles') }}">Contacto</a>
                            </td>
                        </tr>
                    </tbody>

                </table>


                {{-- 
                <div class="grid col-grid-1 sm:grid-cols-3 gap-4">
                    <div>
                        <div class="flex justify-center">
                            <div class="rounded-lg shadow-lg bg-white max-w-sm">
                                <a href="#!">
                                    <img class="rounded-t-lg"
                                        src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="" />
                                </a>
                                <div class="p-6">
                                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                                    <p class="text-gray-700 text-base mb-4">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's
                                        content.
                                    </p>
                                    <button type="button"
                                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Button</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <div class="rounded-lg shadow-lg bg-white max-w-sm">
                                <a href="#!">
                                    <img class="rounded-t-lg"
                                        src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="" />
                                </a>
                                <div class="p-6">
                                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                                    <p class="text-gray-700 text-base mb-4">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's
                                        content.
                                    </p>
                                    <button type="button"
                                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Button</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center">
                            <div class="rounded-lg shadow-lg bg-white max-w-sm">
                                <a href="#!">
                                    <img class="rounded-t-lg"
                                        src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="" />
                                </a>
                                <div class="p-6">
                                    <h5 class="text-gray-900 text-xl font-medium mb-2">Card title</h5>
                                    <p class="text-gray-700 text-base mb-4">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's
                                        content.
                                    </p>
                                    <button type="button"
                                        class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Button</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                --}}


            </div>
        </div>
    </div>

</x-app-layout>
