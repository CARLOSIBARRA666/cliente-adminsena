@extends('layouts.app')

@section('title', 'Editar Instructor')

@section('content')
<div class="admin-module py-2">
    <div class="edit-wrap">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('teacher.create') }}" class="btn-modern btn-modern-outline">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
        </div>

        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-pencil-square"></i> Editar instructor</div>
            </div>
            <div class="panel-body">
                <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="name">Nombre completo</label>
                        <i class="field-icon bi bi-person"></i>
                        <input type="text" id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
                    </div>

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="location">Ubicación</label>
                        <i class="field-icon bi bi-geo-alt"></i>
                        <input type="text" id="location" name="location" value="{{ old('location', $teacher->location) }}" required>
                    </div>

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="area_id">Área de formación</label>
                        <i class="field-icon bi bi-layers"></i>
                        <select id="area_id" name="area_id">
                            <option value="">Seleccione un área</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id', $teacher->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="f-control has-icon mb-4">
                        <label class="label-modern" for="training_center_id">Centro de formación</label>
                        <i class="field-icon bi bi-buildings"></i>
                        <select id="training_center_id" name="training_center_id">
                            <option value="">Seleccione un centro</option>
                            @foreach($training_centers as $training_center)
                                <option value="{{ $training_center->id }}" {{ old('training_center_id', $teacher->training_center_id) == $training_center->id ? 'selected' : '' }}>{{ $training_center->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('teacher.create') }}" class="btn-modern btn-modern-outline">Cancelar</a>
                        <button type="submit" class="btn-modern btn-modern-green">
                            <i class="bi bi-check2-circle"></i> Actualizar instructor
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection