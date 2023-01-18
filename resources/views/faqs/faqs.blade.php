<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Preguntas frecuentes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="my-4">
                    <p>Las preguntas frecuentes y respuestas que listamos a continuación son justamente aquellas que los
                        usuarios y/o clientes nos realizan a menudo.</p>
                    <p>Si no encontrás la respuesta que necesitás en las preguntas frecuentes, podés completar el
                        formulario
                        de contacto y enviarnos tu consulta.</p>
                </div>
                <div class="accordion" id="accordionExample">

                    @foreach ($faqs as $item)
                        <div class="accordion-item bg-white border border-gray-200">
                            <h2 class="accordion-header mb-0" id="heading{{ $item->id }}">
                                <button
                                    class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $item->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $item->id }}">
                                    {{ $item->pregunta }}
                                </button>
                            </h2>
                            <div id="collapse{{ $item->id }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body py-4 px-5">
                                    {{ $item->respuesta }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

</x-app-layout>
