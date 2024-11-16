<x-app-layout>


  <div class="py-8">
    <div class="bg-white shadow rounded-lg p-4">

      <div class="my-4">
        <p>Las preguntas frecuentes y respuestas que listamos a continuación son justamente aquellas que los
          usuarios y/o clientes nos realizan a menudo.</p>
        <p>Si no encontrás la respuesta que necesitás en las preguntas frecuentes, podés completar el
          formulario de contacto y enviarnos tu consulta.</p>
      </div>


      <div class="col-12 pb-6">
        <div class="row justify-content-between col-mb-50">

          @foreach ($faqs as $item)
            <div class="toggle toggle-bg">
              <div class="toggle-header">
                <div class="toggle-icon">
                  <i class="toggle-closed bi-check-circle-fill"></i>
                  <i class="toggle-open bi-x-circle"></i>
                </div>
                <div class="toggle-title">
                  {{ $item->pregunta }}
                </div>
              </div>
              <div class="toggle-content">{{ $item->respuesta }}</div>
            </div>
          @endforeach

        </div>
      </div>

    </div>
  </div>


</x-app-layout>
