<form wire:submit.prevent="saveImagen" class="mb-4 border border-terciary shadow p-3 rounded">

  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        {{-- <label for="color">Seleccionar color</label> --}}
        <select wire:model="color_id" class="form-control">
          <option value="">Seleccione un color</option>
          <option value="1">Rojo</option>
          <option value="2">Verde</option>
          <option value="3">Azul</option>
          <!-- Agrega más colores según necesites -->
        </select>
        @error('selectedColor')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="col-md-7">
      <div class="form-group">
        {{-- <label for="image">Seleccionar imagen</label> --}}
        <input type="file" wire:model="imagen" class="form-control">
        @error('newImage')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-success">+ Agregar</button>
    </div>
  </div>

</form>

<div class="table-responsive">

  <table class="table-auto w-100">
    <thead>
      <tr>
        <th class="cursor-pointer px-4 py-2" wire:click="order('id')">Id</th>
        <th class="cursor-pointer px-4 py-2" wire:click="order('color')">Color</th>
        <th class="cursor-pointer px-4 py-2" wire:click="order('file_name')">Archivo</th>
        <th class="cursor-pointer px-4 py-2">Imagen</th>
        <th class="px-4 py-2">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @if ($imagenes)
        @foreach ($imagenes as $img)
          <tr>
            <td>{{ $img->id }}</td>
            <td>{{ $img->color }}</td>
            <td>{{ $img->file_name }}</td>
            <td>
              <img src="{{ asset($img->file_path) }}" class="w-20 object-contain" style="width: auto; height: 40px;">
            </td>
            <td>
              <a wire:click="deleteImagen('{{ $img->id }}')" class="btn btn-sm btn-danger" title="Eliminar">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
        @endforeach
    </tbody>
    @endif
  </table>

</div>
