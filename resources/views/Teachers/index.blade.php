@extends('layouts.app')

@section('title', 'Instructores')

@section('content')
<div class="admin-module py-2">

    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-person-video3"></i></div>
            <div>
                <div class="module-eyebrow">Operación Académica</div>
                <h1 class="module-title">Instructores</h1>
                <p class="module-subtitle">Administra los instructores, su área y centro de formación.</p>
            </div>
        </div>
        <a href="#module-form" class="btn-modern"><i class="bi bi-plus-lg"></i> Nuevo Instructor</a>
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
                        <i class="bi bi-list-ul"></i> Instructores registrados
                        <span class="count-badge">{{ $teachers->count() }}</span>
                    </div>
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="search" data-target="#table-teachers" placeholder="Buscar instructor...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle" id="table-teachers">
                        <thead>
                            <tr>
                                <th style="width:90px;">ID</th>
                                <th>Instructor</th>
                                <th>Ubicación</th>
                                <th>Área</th>
                                <th>Centro</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teachers as $teacher)
                                <tr>
                                    <td><span class="id-pill">#{{ $teacher->id }}</span></td>
                                    <td>
                                        <a href="{{ route('teacher.show', $teacher->id) }}" class="text-decoration-none text-reset">
                                            <div class="cell-main text-capitalize">{{ $teacher->name }}</div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="cell-line">
                                            <i class="bi bi-geo-alt"></i>
                                            <span>{{ $teacher->location }}</span>
                                        </div>
                                    </td>
                                    <td>{{ optional($areas->firstWhere('id', $teacher->area_id))->name ?? '—' }}</td>
                                    <td>{{ optional($training_centers->firstWhere('id', $teacher->training_center_id))->name ?? '—' }}</td>
                                    <td class="text-end">
                                        <div class="action-group">
                                            <a href="{{ route('teacher.show', $teacher->id) }}" class="btn-icon" title="Ver detalles"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn-icon" title="Editar"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este instructor?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon btn-icon-danger" title="Eliminar"><i class="bi bi-trash3"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr data-empty-row>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="bi bi-person-video3"></i>
                                            <h6>Aún no hay instructores registrados</h6>
                                            <p>Registra el primer instructor desde el formulario.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="panel-card" id="module-form">
                <div class="panel-header">
                    <div class="panel-title"><i class="bi bi-plus-circle"></i> Registrar instructor</div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="name">Nombre completo</label>
                            <i class="field-icon bi bi-person"></i>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Ej: Juan Pérez" required>
                        </div>

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="location">Ubicación</label>
                            <i class="field-icon bi bi-geo-alt"></i>
                            <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Ej: Bloque 3, Piso 2" required>
                        </div>

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="area_id">Área de formación</label>
                            <i class="field-icon bi bi-layers"></i>
                            <select id="area_id" name="area_id" required>
                                <option value="">Seleccione un área</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="f-control has-icon mb-4">
                            <label class="label-modern" for="training_center_id">Centro de formación</label>
                            <i class="field-icon bi bi-buildings"></i>
                            <select id="training_center_id" name="training_center_id" required>
                                <option value="">Seleccione un centro</option>
                                @foreach($training_centers as $training_center)
                                    <option value="{{ $training_center->id }}" {{ old('training_center_id') == $training_center->id ? 'selected' : '' }}>{{ $training_center->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn-modern btn-modern-green w-100 justify-content-center">
                            <i class="bi bi-check2-circle"></i> Guardar instructor
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection