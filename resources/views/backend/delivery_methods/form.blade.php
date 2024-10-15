@extends('adminlte::page')

@section('title', 'Método de Entrega')

@section('content_header')
  <h1>{{ isset($deliveryMethod) ? 'Editar Método de Entrega' : 'Nuevo Método de Entrega' }}</h1>
@endsection

@section('content')
  <form
    action="{{ isset($deliveryMethod) ? route('delivery_methods.update', $deliveryMethod->id) : route('delivery_methods.store') }}"
    method="POST">
    @csrf
    @if (isset($deliveryMethod))
      @method('PUT')
    @endif

    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" name="name" class="form-control"
        value="{{ isset($deliveryMethod) ? $deliveryMethod->name : old('name') }}" required>
    </div>

    <div class="form-group">
      <label for="cost">Costo</label>
      <input type="number" step="0.01" name="cost" class="form-control"
        value="{{ isset($deliveryMethod) ? $deliveryMethod->cost : old('cost') }}" required>
    </div>

    <div class="form-group">
      <label for="status">Estado</label>
      <select name="status" class="form-control">
        <option value="1" {{ isset($deliveryMethod) && $deliveryMethod->status ? 'selected' : '' }}>Activo</option>
        <option value="0" {{ isset($deliveryMethod) && !$deliveryMethod->status ? 'selected' : '' }}>Inactivo
        </option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($deliveryMethod) ? 'Actualizar' : 'Guardar' }}</button>
    <a href="{{ route('delivery_methods.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection
