<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Contáctenos {{ session('idCarrito') }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="container">
      <div class="bg-white shadow p-4 rounded-lg">

        <!-- Google Map Section -->
        <section id="google-map" class="gmap" style="height: 410px;">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0272290824646!2d-58.37684288423676!3d-34.603472964993166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacda843d817%3A0xc2ad9185a06cb900!2sSan%20Mart%C3%ADn%20439%2C%20C1004%20CABA!5e0!3m2!1ses-419!2sar!4v1635368043785!5m2!1ses-419!2sar"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>

        <div class="row mt-5">
          <div class="col-md-4">
            <h3 class="h5">Información de contacto</h3>
            <p class="text-muted">Use una dirección permanente donde pueda recibir correo.</p>
          </div>

          <div class="col-md-8">
            @if (Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
            @endif

            <form method="POST" action="{{ route('contacto.store') }}" id="contactUSForm">
              {{ csrf_field() }}

              <div class="card">
                <div class="card-body">
                  <div class="row g-3">

                    <!-- Nombre -->
                    <div class="col-lg-4">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                        class="form-control @error('nombre') is-invalid @enderror">
                      @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Correo -->
                    <div class="col-lg-4">
                      <label for="correo" class="form-label">Correo</label>
                      <input type="email" name="correo" id="correo" value="{{ old('correo') }}"
                        class="form-control @error('correo') is-invalid @enderror">
                      @error('correo')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Teléfono -->
                    <div class="col-lg-4">
                      <label for="telefono" class="form-label">Teléfono</label>
                      <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                        class="form-control @error('telefono') is-invalid @enderror">
                      @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Asunto -->
                    <div class="col-12">
                      <label for="asunto" class="form-label">Asunto</label>
                      <input type="text" name="asunto" id="asunto" value="{{ old('asunto') }}"
                        class="form-control @error('asunto') is-invalid @enderror">
                      @error('asunto')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <!-- Mensaje -->
                    <div class="col-12">
                      <label for="mensaje" class="form-label">Mensaje</label>
                      <textarea id="mensaje" name="mensaje" rows="3" class="form-control @error('mensaje') is-invalid @enderror">{{ old('mensaje') }}</textarea>
                      @error('mensaje')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      <p class="form-text text-muted">Datos de contacto de la empresa.</p>
                    </div>

                  </div>
                </div>

                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
