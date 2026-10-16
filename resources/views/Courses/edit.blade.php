@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
<div class="admin-module py-2">
    <div class="edit-wrap">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('course.create') }}" class="btn-modern btn-modern-outline">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
        </div>

        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-pencil-square"></i> Editar curso / ficha</div>
            </div>
            <div class="panel-body">
                <form action="{{ route('course.update', $course->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="course_number">Número de curso</label>
                        <i class="field-icon bi bi-hash"></i>
                        <input type="text" id="course_number" name="course_number" value="{{ old('course_number', $course->course_number) }}" required>
                    </div>

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="day">Día</label>
                        <i class="field-icon bi bi-calendar3"></i>
                        <input type="text" id="day" name="day" value="{{ old('day', $course->day) }}" required>
                    </div>

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="area_id">Área de formación</label>
                        <i class="field-icon bi bi-layers"></i>
                        <select id="area_id" name="area_id">
                            <option value="">Seleccione un área</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id', $course->area_id) == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="f-control has-icon mb-4">
                        <label class="label-modern" for="training_center_id">Centro de formación</label>
                        <i class="field-icon bi bi-buildings"></i>
                        <select id="training_center_id" name="training_center_id">
                            <option value="">Seleccione un centro</option>
                            @foreach($training_centers as $training_center)
                                <option value="{{ $training_center->id }}" {{ old('training_center_id', $course->training_center_id) == $training_center->id ? 'selected' : '' }}>{{ $training_center->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('course.create') }}" class="btn-modern btn-modern-outline">Cancelar</a>
                        <button type="submit" class="btn-modern btn-modern-green">
                            <i class="bi bi-check2-circle"></i> Actualizar curso
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection