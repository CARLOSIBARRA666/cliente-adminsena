@extends('layouts.app')

@section('title', 'Detalle de la Asignación')

@section('content')
<div class="admin-module py-2">
    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-link-45deg"></i></div>
            <div>
                <div class="module-eyebrow">Operación Académica</div>
                <h1 class="module-title">Asignación Curso / Instructor</h1>
                <p class="module-subtitle">Detalle de la asignación seleccionada.</p>
            </div>
        </div>
        <a href="{{ route('course_teacher.create') }}" class="btn-modern"><i class="bi bi-arrow-left"></i> Volver al listado</a>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-7">
            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title"><i class="bi bi-info-circle"></i> Detalles del registro</div>
                    <span class="badge-status"><i class="bi bi-check-circle-fill"></i> Activa</span>
                </div>
                <div class="panel-body">
                    <div class="detail-item">
                        <span class="detail-label">ID</span>
                        <span class="detail-value">#{{ $course_teacher->id }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Curso / Ficha</span>
                        <span class="detail-value">{{ optional($course_teacher->course)->course_number ? 'Ficha ' . $course_teacher->course->course_number : '—' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Día</span>
                        <span class="detail-value">{{ optional($course_teacher->course)->day ?? '—' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Instructor</span>
                        <span class="detail-value text-capitalize">{{ optional($course_teacher->teacher)->name ?? '—' }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Fecha de asignación</span>
                        <span class="detail-value">
                            {{ \Carbon\Carbon::parse($course_teacher->created_at)->format('d/m/Y') }}
                            <small>{{ \Carbon\Carbon::parse($course_teacher->created_at)->format('h:i A') }}</small>
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
                    <a href="{{ route('course_teacher.edit', $course_teacher->id) }}" class="btn-modern btn-modern-green w-100 justify-content-center">
                        <i class="bi bi-pencil"></i> Editar asignación
                    </a>
                    <form action="{{ route('course_teacher.destroy', $course_teacher->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta asignación?')" class="w-100">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-modern btn-modern-danger w-100 justify-content-center">
                            <i class="bi bi-trash3"></i> Eliminar asignación
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection