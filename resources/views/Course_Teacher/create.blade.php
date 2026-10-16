@extends('layouts.app')

@section('title', 'Asignación Cursos / Instructores')

@section('content')
<div class="admin-module py-2">

    <!-- Encabezado del módulo -->
    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-link-45deg"></i></div>
            <div>
                <div class="module-eyebrow">Operación Académica</div>
                <h1 class="module-title">Asignación de Cursos / Instructores</h1>
                <p class="module-subtitle">Asigna instructores a los cursos o fichas académicas.</p>
            </div>
        </div>
        <a href="#module-form" class="btn-modern"><i class="bi bi-plus-lg"></i> Nueva Asignación</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Por favor corrige los siguientes errores:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4 mt-1">

        <!-- Listado -->
        <div class="col-xl-8">
            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="bi bi-list-ul"></i> Asignaciones registradas
                        <span class="count-badge">{{ $course_teachers->count() }}</span>
                    </div>
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="search" data-target="#table-assignments" placeholder="Buscar asignación...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle" id="table-assignments">
                        <thead>
                            <tr>
                                <th style="width:90px;">ID</th>
                                <th>Curso / Ficha</th>
                                <th>Instructor</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($course_teachers as $course_teacher)
                                <tr>
                                    <td><span class="id-pill">#{{ $course_teacher->id }}</span></td>
                                    <td>
                                        <a href="{{ route('course_teacher.show', $course_teacher->id) }}" class="text-decoration-none text-reset">
                                            <div class="cell-main">{{ optional($course_teacher->course)->course_number ? 'Ficha ' . $course_teacher->course->course_number : '—' }}</div>
                                            <div class="cell-sub">{{ optional($course_teacher->course)->day ?? '' }}</div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="cell-line">
                                            <i class="bi bi-person-video3"></i>
                                            <span class="text-capitalize">{{ optional($course_teacher->teacher)->name ?? '—' }}</span>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="action-group">
                                            <a href="{{ route('course_teacher.show', $course_teacher->id) }}" class="btn-icon" title="Ver detalles"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('course_teacher.edit', $course_teacher->id) }}" class="btn-icon" title="Editar"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('course_teacher.destroy', $course_teacher->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta asignación?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon btn-icon-danger" title="Eliminar"><i class="bi bi-trash3"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr data-empty-row>
                                    <td colspan="4">
                                        <div class="empty-state">
                                            <i class="bi bi-link-45deg"></i>
                                            <h6>Aún no hay asignaciones registradas</h6>
                                            <p>Asigna el primer instructor a un curso desde el formulario.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Formulario -->
        <div class="col-xl-4">
            <div class="panel-card" id="module-form">
                <div class="panel-header">
                    <div class="panel-title"><i class="bi bi-plus-circle"></i> Nueva asignación</div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('course_teacher.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="course_id">Curso / Ficha</label>
                            <i class="field-icon bi bi-journal-text"></i>
                            <select id="course_id" name="course_id">
                                <option value="">Seleccione un curso</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->course_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="f-control has-icon mb-4">
                            <label class="label-modern" for="teacher_id">Instructor</label>
                            <i class="field-icon bi bi-person-video3"></i>
                            <select id="teacher_id" name="teacher_id">
                                <option value="">Seleccione un instructor</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn-modern btn-modern-green w-100 justify-content-center">
                            <i class="bi bi-check2-circle"></i> Guardar asignación
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection