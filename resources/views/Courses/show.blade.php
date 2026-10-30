@extends('layouts.app')

@section('title', 'Detalle del Curso')

@section('content')
<div class="admin-module py-2">
    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-journal-text"></i></div>
            <div>
                <div class="module-eyebrow">Operación Académica</div>
                <h1 class="module-title">Curso / Ficha</h1>
                <p class="module-subtitle">Detalle de la ficha académica seleccionada.</p>
            </div>
        </div>
        <a href="{{ route('course.create') }}" class="btn-modern"><i class="bi bi-arrow-left"></i> Volver al listado</a>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-7">
            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title"><i class="bi bi-info-circle"></i> Detalles del registro</div>
                    <span class="badge-status"><i class="bi bi-check-circle-fill"></i> Activo</span>
                </div>
                <div class="panel-body">
                    <div class="detail-item">
                        <span class="detail-label">ID</span>
                        <span class="detail-value">#{{ $course->id }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Número de curso</span>
                        <span class="detail-value">Ficha {{ $course->course_number }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Día</span>
                        <span class="detail-value">{{ $course->day }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Área de formación</span>
                        <span class="detail-value">{{ optional($areas->firstWhere('id', $course->area_id))->name ?? '—' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Centro de formación</span>
                        <span class="detail-value">{{ optional($training_centers->firstWhere('id', $course->training_center_id))->name ?? '—' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Fecha de creación</span>
                        <span class="detail-value">
                            {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y') }}
                            <small>{{ \Carbon\Carbon::parse($course->created_at)->format('h:i A') }}</small>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title"><i class="bi bi-lightning-charge"></i> Acciones</div>
                </div>
                <div class="panel-body d-flex flex-column gap-2">
                    <a href="{{ route('course.edit', $course->id) }}" class="btn-modern btn-modern-green w-100 justify-content-center">
                        <i class="bi bi-pencil"></i> Editar curso
                    </a>
                    <form action="{{ route('course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este curso?')" class="w-100">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-modern btn-modern-danger w-100 justify-content-center">
                            <i class="bi bi-trash3"></i> Eliminar curso
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection