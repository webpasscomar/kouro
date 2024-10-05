<x-app-layout>

  <div class="py-4">
    <div class="container">
      <div class="bg-white shadow-lg rounded-lg p-4 min-h-0" style="height: 500px;">

        <div class="my-4">
          <p>Las preguntas frecuentes y respuestas que listamos a continuación son justamente aquellas que los
            usuarios y/o clientes nos realizan a menudo.</p>
          <p>Si no encontrás la respuesta que necesitás en las preguntas frecuentes, podés completar el
            formulario de contacto y enviarnos tu consulta.</p>
        </div>






        <div class="col-12">
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










        {{-- <div class="accordion" id="accordionFaq">
          @foreach ($faqs as $item)
            <div class="accordion-item">
              <h2 class="accordion-header" id="heading-{{ $item->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse-{{ $item->id }}" aria-expanded="false"
                  aria-controls="collapse-{{ $item->id }}" onclick="cambiarPosicionArrow({{ $item->id }})">
                  {{ $item->pregunta }}
                </button>
                <span>
                  <img src="{{ asset('/img/arrow.svg') }}" alt="desplegar menu" class="arrow w-6"
                    id="arrow-{{ $item->id }}">
                </span>
              </h2>
              <div id="collapse-{{ $item->id }}" class="accordion-collapse collapse"
                aria-labelledby="heading-{{ $item->id }}" data-bs-parent="#accordionFaq">
                <div class="accordion-body">
                  {{ $item->respuesta }}
                </div>
              </div>
            </div>
          @endforeach
        </div> --}}

      </div>
    </div>
  </div>
  
</x-app-layout>