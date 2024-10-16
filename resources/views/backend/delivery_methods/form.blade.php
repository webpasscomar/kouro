@extends('layouts.adminlte')

@section('title', 'Forma de Entrega')


@section('content_header_title', 'Admin')
@section('content_header_subtitle')
  {{ isset($deliveryMethod) ? 'Editar Forma de Entrega' : 'Nueva Forma de Entrega' }}
@endsection

@section('content_body')

  <div class="card">
    <div class="card-body">

      <form action="{{ isset($deliveryMethod) ? route('formas.update', $deliveryMethod->id) : route('formas.store') }}"
        method="POST">
        @csrf
        @if (isset($deliveryMethod))
          @method('PUT')
        @endif

        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ isset($deliveryMethod) ? $deliveryMethod->name : old('name') }}">
          @error('name')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="cost">Costo</label>
          <input type="number" step="0.01" name="cost" class="form-control @error('cost') is-invalid @enderror"
            value="{{ isset($deliveryMethod) ? $deliveryMethod->cost : old('cost') }}">
          @error('cost')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status">Estado</label>
          <select name="status" class="form-control">
            <option value="1" {{ isset($deliveryMethod) && $deliveryMethod->status ? 'selected' : '' }}>
              Activo
            </option>
            <option value="0" {{ isset($deliveryMethod) && !$deliveryMethod->status ? 'selected' : '' }}>
              Inactivo
            </option>
          </select>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($deliveryMethod) ? 'Actualizar' : 'Guardar' }}</button>
        <a href="{{ route('formas.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>

    </div>
  </div>

@endsection
