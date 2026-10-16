@extends('layouts.app')

@section('title', 'Editar Asignación Curso-Instructor')

@section('content')
<div class="admin-module py-2">
    <div class="edit-wrap">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('course_teacher.create') }}" class="btn-modern btn-modern-outline">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
        </div>

        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-pencil-square"></i> Editar asignación</div>
            </div>
            <div class="panel-body">
                <form action="{{ route('course_teacher.update', $course_teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="course_id">Curso / Ficha</label>
                        <i class="field-icon bi bi-journal-text"></i>
                        <select id="course_id" name="course_id">
                            <option value="">Seleccione un curso</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $course_teacher->course_id) == $course->id ? 'selected' : '' }}>{{ $course->course_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="f-control has-icon mb-4">
                        <label class="label-modern" for="teacher_id">Instructor</label>
                        <i class="field-icon bi bi-person-video3"></i>
                        <select id="teacher_id" name="teacher_id">
                            <option value="">Seleccione un instructor</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id', $course_teacher->teacher_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('course_teacher.create') }}" class="btn-modern btn-modern-outline">Cancelar</a>
                        <button type="submit" class="btn-modern btn-modern-green">
                            <i class="bi bi-check2-circle"></i> Actualizar asignación
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection