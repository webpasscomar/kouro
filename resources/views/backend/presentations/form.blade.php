@extends('layouts.adminlte')
@section('title', 'Forma de Entrega')
@section('content_header_title', 'Admin')

@section('content_header_subtitle')
  {{ isset($presentation) ? 'Editar Presentación' : 'Nueva Presentación' }}
@endsection

@section('content_body')
  <div class="card">
    <div class="card-body">
      <form
        action="{{ isset($presentation) ? route('presentations.update', $presentation->id) : route('presentations.store') }}"
        method="POST">
        @csrf
        @if (isset($presentation))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="presentacion">Presentación</label><span class="ml-1 text-danger">*</span>
          <input type="text" name="presentacion" class="form-control @error('presentacion') is-invalid @enderror"
            value="{{ isset($presentation) ? $presentation->presentacion : old('presentacion') }}">
          @error('presentacion')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="sigla">Sigla</label><span class="ml-1 text-danger">*</span>
          <input type="text" name="sigla" class="form-control @error('sigla') is-invalid @enderror"
            value="{{ isset($presentation) ? $presentation->sigla : old('sigla') }}">
          @error('sigla')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="estado">Estado</label>
          <select name="estado" class="form-control">
            <option value="1" {{ isset($presentation) && $presentation->estado ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ isset($presentation) && !$presentation->estado ? 'selected' : '' }}>Inactivo
            </option>
          </select>
        </div>

        <p class="my-3 text-right field_required"><span
            class="text-danger field_required-icon align-middle">*</span>Campos obligatorios</p>
        <button type="submit" class="btn btn-success">{{ isset($presentation) ? 'Actualizar' : 'Guardar' }}</button>
        <a href="{{ route('presentations.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
@endsection
