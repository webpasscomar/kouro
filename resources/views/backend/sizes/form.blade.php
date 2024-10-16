@extends('layouts.adminlte')
@section('title', 'Talle')
@section('content_header_title', 'Admin')
@section('content_header_subtitle')
  {{ isset($size) ? 'Editar Talle' : 'Nuevo Talle' }}
@endsection
@section('content_body')
  <div class="card">
    <div class="card-body">
      <form action="{{ isset($size) ? route('sizes.update', $size->id) : route('sizes.store') }}" method="POST">
        @csrf
        @if (isset($size))
          @method('PUT')
        @endif
        <div class="form-group">
          <label for="talle">Talle</label><span class="ml-1 text-danger">*</span>
          <input type="text" name="talle" class="form-control @error('talle') is-invalid @enderror"
            value="{{ isset($size) ? $size->talle : old('talle') }}">
          @error('talle')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="estado">Estado</label>
          <select name="estado" class="form-select">
            <option value="1" {{ isset($size) && $size->estado ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ isset($size) && !$size->estado ? 'selected' : '' }}>Inactivo</option>
          </select>
        </div>
        <p class="my-3 text-right field_required"><span
            class="text-danger field_required-icon align-middle">*</span>Campos obligatorios</p>
        <button type="submit" class="btn btn-success">{{ isset($size) ? 'Actualizar' : 'Guardar' }}</button>
        <a href="{{ route('sizes.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
@endsection
