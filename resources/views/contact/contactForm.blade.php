<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contáctenos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="container">

                    <section id="google-map" class="gmap" style="height: 410px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0272290824646!2d-58.37684288423676!3d-34.603472964993166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacda843d817%3A0xc2ad9185a06cb900!2sSan%20Mart%C3%ADn%20439%2C%20C1004%20CABA!5e0!3m2!1ses-419!2sar!4v1635368043785!5m2!1ses-419!2sar"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </section>


                    {{-- <div class="row mt-5 mb-5">
                        <div class="col-10 offset-1 mt-5">
                            <div class="card">

                                <div class="card-body">

                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('contacto.store') }}" id="contactUSForm">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="form-group">
                                                <strong>Nombre:</strong>
                                                <input type="text" name="nombre" class="form-control"
                                                    placeholder="Nombre" value="{{ old('nombre') }}">
                                                @if ($errors->has('nombre'))
                                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <strong>Correo:</strong>
                                                <input type="text" name="correo" class="form-control"
                                                    placeholder="correo" value="{{ old('correo') }}">
                                                @if ($errors->has('correo'))
                                                    <span class="text-danger">{{ $errors->first('correo') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>Telefono:</strong>
                                                    <input type="text" name="telefono" class="form-control"
                                                        placeholder="telefono" value="{{ old('telefono') }}">
                                                    @if ($errors->has('telefono'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('telefono') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>Asunto:</strong>
                                                    <input type="text" name="asunto" class="form-control"
                                                        placeholder="asunto" value="{{ old('asunto') }}">
                                                    @if ($errors->has('asunto'))
                                                        <span class="text-danger">{{ $errors->first('asunto') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <strong>Mensaje:</strong>
                                                    <textarea name="mensaje" rows="3" class="form-control">{{ old('mensaje') }}</textarea>
                                                    @if ($errors->has('mensaje'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('mensaje') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <button class="btn btn-success btn-submit">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">

                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Información de contacto</h3>
                                    <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive
                                        mail.</p>
                                </div>
                            </div>


                            <div class="mt-5 md:col-span-2 md:mt-0">

                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('contacto.store') }}" id="contactUSForm">
                                    {{ csrf_field() }}
                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">


                                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                    <label for="nombre"
                                                        class="block text-sm font-medium text-gray-700">Nombre</label>
                                                    <input type="text" name="nombre" id="nombre"
                                                        value="{{ old('nombre') }}" autocomplete="address-level2"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    @if ($errors->has('nombre'))
                                                        <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="correo"
                                                        class="block text-sm font-medium text-gray-700">Correo</label>
                                                    <input type="text" name="correo" id="correo"
                                                        value="{{ old('correo') }}" autocomplete="address-level1"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    @if ($errors->has('correo'))
                                                        <span class="text-danger">{{ $errors->first('correo') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                    <label for="telefono"
                                                        class="block text-sm font-medium text-gray-700">Teléfono</label>
                                                    <input type="text" name="telefono" id="telefono"
                                                        value="{{ old('telefono') }}" autocomplete="telefono"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    @if ($errors->has('telefono'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('telefono') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-span-6">
                                                    <label for="asunto"
                                                        class="block text-sm font-medium text-gray-700">Asunto
                                                    </label>
                                                    <input type="text" name="asunto" id="asunto"
                                                        value="{{ old('asunto') }}" autocomplete="asunto"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    @if ($errors->has('asunto'))
                                                        <span class="text-danger">{{ $errors->first('asunto') }}</span>
                                                    @endif
                                                </div>

                                                <div class="col-span-6">
                                                    <label for="mensaje"
                                                        class="block text-sm font-medium text-gray-700">Mensaje</label>
                                                    <div class="mt-1">
                                                        <textarea id="mensaje" name="mensaje" rows="3" value="{{ old('mensaje') }}"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                            placeholder="you@example.com"></textarea>
                                                        @if ($errors->has('mensaje'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('mensaje') }}</span>
                                                        @endif
                                                    </div>
                                                    <p class="mt-2 text-sm text-gray-500">Datos de contacto de la
                                                        empresa.
                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit"
                                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Enviar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

















                </div>
            </div>
        </div>
</x-app-layout>
