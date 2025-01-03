

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