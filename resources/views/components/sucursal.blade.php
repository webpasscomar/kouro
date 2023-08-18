    {{-- @props(['color']) --}}

    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-x-4  rounded-lg shadow-lg shadow-gray-500 {{ $background }}">
        <!-- Imagen y descripción de la sucursal -->
        <div class="p-6 rounded-lg">
            <img class="w-full h-96 md:h-64 object-cover rounded-lg"
                src="https://kouro.webpass.online/assets/uploads/7/local1.jpg" alt="sucursal Moron" />
            <div class="mt-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700">Sucursal Morón</h5>
                <h6 class="mb-3 font-normal {{ $color }}">Almte. Brown 744</h6>
                <p class="{{ $color }}">Lunes a Sábados de 9:00 a 19:30 hs</p>
                <p class="{{ $color }} font-semibold">Domingos Cerrado</p>
                <p class="mt-3"><strong class="{{ $color }}">Tel 11-4629-4476</strong></p>
            </div>
        </div>
        <!-- Google Maps -->
        <div class="aspect-auto p-6 md:col-span-2">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1641.081374353732!2d-58.62018834310188!3d-34.65059256748799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc766ccb08501%3A0x8be78c8a0de27125!2sKouro%20Linea%20Fina%20-%20Cuero%20Argentino!5e0!3m2!1ses!2sar!4v1674231149687!5m2!1ses!2sar"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                class="w-full md:h-full rounded-lg h-64"></iframe>
        </div>
    </div>
