@extends('layouts.adminlte')

@section('subtitle', 'Preguntas Frecuentes')

@section('content_header_title', 'Admin')

@section('content_header_subtitle', 'Preguntas Frecuentes')

@section('content_body')

  <div class="card">

    <div class="card-header text-right">
      <a href="{{ route('faqs.create') }}" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Nuevo</a>
    </div>

    <div class="card-body">
      <div class="table-responsive">

        <table id="myTable" class="table my-4 table-bordered table-striped">
          <thead>
            <tr>
              <th>Pregunta</th>
              {{-- <th>Respuesta</th> --}}
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($faqs as $faq)
              <tr>
                <td class="align-middle">{{ $faq->pregunta }}</td>
                {{-- <td class="align-middle">{{ $faq->respuesta }}</td> --}}
                <td class="text-center">
                  @livewire(
                      'toggle-button',
                      [
                          'model' => $faq,
                          'field' => 'estado',
                      ],
                      key($faq->id)
                  )
                </td>
                <td class="text-right align-middle">
                  <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ route('faqs.destroy', $faq->id) }}" class="btn btn-sm btn-danger"
                    data-confirm-delete="true">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('css')
@endsection


@section('js')
@endsection
