@extends('layouts.adminlte')
@section('title', 'Pedido')
@section('content_header_title', 'Admin')
@section('content_header_subtitle')
  {{ isset($order) ? 'Editar Pedido' : 'Nuevo Pedido' }}
@endsection
@section('content_body')
  <div class="card">
    <div class="card-body">
      <form action="{{ isset($order) ? route('orders.update', $order->id) : route('orders.store') }}" method="POST">
        @csrf
        @if (isset($order))
          @method('PUT')
        @endif

        <div class="row">
          <div class="col">

          </div>
          <div class="col">

          </div>
          <div class="col">
            <!-- ID de Entrega y Estado -->
            <div class="form-group">
              <label for="entrega_id">ID de Entrega</label><span class="ml-1 text-danger">*</span>
              <input type="number" name="entrega_id" class="form-control @error('entrega_id') is-invalid @enderror"
                value="{{ isset($order) ? $order->entrega_id : old('entrega_id') }}">
              @error('entrega_id')
                <span class="text-danger ml-1">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="estado_id">Estado</label><span class="ml-1 text-danger">*</span>
              <select name="estado_id" class="form-select @error('estado_id') is-invalid @enderror">
                <option value="1" {{ isset($order) && $order->estado_id == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ isset($order) && $order->estado_id == 0 ? 'selected' : '' }}>Inactivo</option>
              </select>
              @error('estado_id')
                <span class="text-danger ml-1">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col">
            <!-- Nombre -->
            <div class="form-group">
              <label for="nombre">Nombre</label><span class="ml-1 text-danger">*</span>
              <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ isset($order) ? $order->nombre : old('nombre') }}">
              @error('nombre')
                <span class="text-danger ml-1">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col">
            <!-- Apellido -->
            <div class="form-group">
              <label for="apellido">Apellido</label><span class="ml-1 text-danger">*</span>
              <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror"
                value="{{ isset($order) ? $order->apellido : old('apellido') }}">
              @error('apellido')
                <span class="text-danger ml-1">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col">
            <!-- Teléfono -->
            <div class="form-group">
              <label for="telefono">Teléfono</label><span class="ml-1 text-danger">*</span>
              <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                value="{{ isset($order) ? $order->telefono : old('telefono') }}">
              @error('telefono')
                <span class="text-danger ml-1">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="col">
            <!-- Correo -->
            <div class="form-group">
              <label for="correo">Correo</label><span class="ml-1 text-danger">*</span>
              <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror"
                value="{{ isset($order) ? $order->correo : old('correo') }}">
              @error('correo')
                <span class="text-danger ml-1">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>








        <!-- Dirección (Calle y Nro) -->
        {{-- <div class="form-group">
          <label for="del_calle">Calle</label><span class="ml-1 text-danger">*</span>
          <input type="text" name="del_calle" class="form-control @error('del_calle') is-invalid @enderror"
            value="{{ isset($order) ? $order->del_calle : old('del_calle') }}">
          @error('del_calle')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        {{-- <div class="form-group">
          <label for="del_nro">Número</label><span class="ml-1 text-danger">*</span>
          <input type="number" name="del_nro" class="form-control @error('del_nro') is-invalid @enderror"
            value="{{ isset($order) ? $order->del_nro : old('del_nro') }}">
          @error('del_nro')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        <!-- Piso y Departamento -->
        {{-- <div class="form-group">
          <label for="del_piso">Piso</label>
          <input type="text" name="del_piso" class="form-control @error('del_piso') is-invalid @enderror"
            value="{{ isset($order) ? $order->del_piso : old('del_piso') }}">
          @error('del_piso')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        {{-- <div class="form-group">
          <label for="del_dpto">Departamento</label>
          <input type="text" name="del_dpto" class="form-control @error('del_dpto') is-invalid @enderror"
            value="{{ isset($order) ? $order->del_dpto : old('del_dpto') }}">
          @error('del_dpto')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        <!-- Localidad y Provincia -->
        {{-- <div class="form-group">
          <label for="localidad_id">Localidad</label><span class="ml-1 text-danger">*</span>
          <input type="number" name="localidad_id" class="form-control @error('localidad_id') is-invalid @enderror"
            value="{{ isset($order) ? $order->localidad_id : old('localidad_id') }}">
          @error('localidad_id')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        {{-- <div class="form-group">
          <label for="provincia_id">Provincia</label><span class="ml-1 text-danger">*</span>
          <input type="number" name="provincia_id" class="form-control @error('provincia_id') is-invalid @enderror"
            value="{{ isset($order) ? $order->provincia_id : old('provincia_id') }}">
          @error('provincia_id')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        <!-- Observaciones -->
        {{-- <div class="form-group">
          <label for="observaciones">Observaciones</label>
          <textarea name="observaciones" class="form-control @error('observaciones') is-invalid @enderror">{{ isset($order) ? $order->observaciones : old('observaciones') }}</textarea>
          @error('observaciones')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        <!-- Cantidad de Items, Subtotal, Total, Costo de Entrega -->
        {{-- <div class="form-group">
          <label for="cantidadItems">Cantidad de Items</label><span class="ml-1 text-danger">*</span>
          <input type="number" name="cantidadItems" class="form-control @error('cantidadItems') is-invalid @enderror"
            value="{{ isset($order) ? $order->cantidadItems : old('cantidadItems') }}">
          @error('cantidadItems')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        {{-- <div class="form-group">
          <label for="subTotal">Subtotal</label><span class="ml-1 text-danger">*</span>
          <input type="number" step="0.01" name="subTotal"
            class="form-control @error('subTotal') is-invalid @enderror"
            value="{{ isset($order) ? $order->subTotal : old('subTotal') }}">
          @error('subTotal')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        {{-- <div class="form-group">
          <label for="total">Total</label><span class="ml-1 text-danger">*</span>
          <input type="number" step="0.01" name="total" class="form-control @error('total') is-invalid @enderror"
            value="{{ isset($order) ? $order->total : old('total') }}">
          @error('total')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}

        {{-- <div class="form-group">
          <label for="del_costo">Costo de Entrega</label><span class="ml-1 text-danger">*</span>
          <input type="number" step="0.01" name="del_costo"
            class="form-control @error('del_costo') is-invalid @enderror"
            value="{{ isset($order) ? $order->del_costo : old('del_costo') }}">
          @error('del_costo')
            <span class="text-danger ml-1">{{ $message }}</span>
          @enderror
        </div> --}}





        <button type="submit" class="btn btn-success">{{ isset($order) ? 'Actualizar' : 'Guardar' }}</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
@endsection
