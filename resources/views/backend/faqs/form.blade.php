@extends('layouts.adminlte')

@section('title', 'Preguntas frecuentes')


@section('content_header_title', 'Admin')
@section('content_header_subtitle')
    {{ isset($Faq) ? 'Editar Pregunta Frecuente' : 'Nueva Pregunta Frecuente' }}
@endsection

@section('content_body')

    <div class="card">
        <div class="card-body">

            <form action="{{ isset($Faq) ? route('faqs.update', $Faq->id) : route('faqs.store') }}"
                method="POST">
                @csrf
                @if (isset($Faq))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="pregunta">Pregunta</label><span class="ml-1 text-danger">*</span>
                    <input type="text" name="pregunta" class="form-control @error('pregunta') is-invalid @enderror"
                        value="{{ isset($Faq) ? $Faq->pregunta : old('pregunta') }}">
                    @error('pregunta')
                        <span class="text-danger ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="respuesta">Respuesta</label><span class="ml-1 text-danger">*</span>
                    <input type="text" name="respuesta" class="form-control @error('respuesta') is-invalid @enderror"
                        value="{{ isset($Faq) ? $Faq->respuesta : old('respuesta') }}">
                    @error('respuesta')
                        <span class="text-danger ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-select">
                        <option value="1" {{ isset($Faq) && $Faq->estado ? 'selected' : '' }}>
                            Activo
                        </option>
                        <option value="0" {{ isset($Faq) && !$Faq->estado ? 'selected' : '' }}>
                            Inactivo
                        </option>
                    </select>
                </div>
                <p class="my-3 text-right field_required"><span
                        class="text-danger field_required-icon align-middle">*</span>Campos
                    obligatorios
                </p>

                <button type="submit"
                    class="btn btn-success">{{ isset($Faq) ? 'Actualizar' : 'Guardar' }}</button>
                <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>

        </div>
    </div>

@endsection
