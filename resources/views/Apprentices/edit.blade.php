@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
<div class="admin-module py-2">
    <div class="edit-wrap">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('apprentice.create') }}" class="btn-modern btn-modern-outline">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Por favor corrige los siguientes errores:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-pencil-square"></i> Editar aprendiz</div>
            </div>
            <div class="panel-body">
                <form action="{{ route('apprentice.update', $apprentice->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="name">Nombre completo</label>
                        <i class="field-icon bi bi-person"></i>
                        <input type="text" id="name" name="name" value="{{ old('name', $apprentice->name) }}" required>
                    </div>

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="email">Correo electrónico</label>
                        <i class="field-icon bi bi-envelope"></i>
                        <input type="email" id="email" name="email" value="{{ old('email', $apprentice->email) }}" required>
                    </div>

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="number">Número de teléfono</label>
                        <i class="field-icon bi bi-telephone"></i>
                        <input type="text" id="number" name="number" value="{{ old('number', $apprentice->number) }}" required>
                    </div>

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="course_id">Curso / Ficha</label>
                        <i class="field-icon bi bi-journal-text"></i>
                        <select id="course_id" name="course_id">
                            <option value="">Seleccione un curso</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $apprentice->course_id) == $course->id ? 'selected' : '' }}>{{ $course->course_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="f-control has-icon mb-4">
                        <label class="label-modern" for="computer_id">Equipo de cómputo</label>
                        <i class="field-icon bi bi-pc-display"></i>
                        <select id="computer_id" name="computer_id">
                            <option value="">Seleccione un equipo</option>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}" {{ old('computer_id', $apprentice->computer_id) == $computer->id ? 'selected' : '' }}>Equipo {{ $computer->number }} — {{ $computer->brand }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('apprentice.create') }}" class="btn-modern btn-modern-outline">Cancelar</a>
                        <button type="submit" class="btn-modern btn-modern-green">
                            <i class="bi bi-check2-circle"></i> Actualizar aprendiz
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection