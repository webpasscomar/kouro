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
                    <label for="question">Pregunta</label><span class="ml-1 text-danger">*</span>
                    <input type="text" name="question" class="form-control @error('question') is-invalid @enderror"
                        value="{{ isset($Faq) ? $Faq->question : old('question') }}">
                    @error('question')
                        <span class="text-danger ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="answer">Respuesta</label><span class="ml-1 text-danger">*</span>
                    <input type="text" name="answer" class="form-control @error('answer') is-invalid @enderror"
                        value="{{ isset($Faq) ? $Faq->answer : old('answer') }}">
                    @error('answer')
                        <span class="text-danger ml-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ isset($Faq) && $Faq->status ? 'selected' : '' }}>
                            Activo
                        </option>
                        <option value="0" {{ isset($Faq) && !$Faq->status ? 'selected' : '' }}>
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
