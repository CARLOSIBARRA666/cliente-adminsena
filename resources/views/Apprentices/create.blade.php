@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
<div class="admin-module py-2">

    <!-- Encabezado del módulo -->
    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-people"></i></div>
            <div>
                <div class="module-eyebrow">Operación Académica</div>
                <h1 class="module-title">Aprendices</h1>
                <p class="module-subtitle">Administra los aprendices, sus cursos y equipos asignados.</p>
            </div>
        </div>
        <a href="#module-form" class="btn-modern"><i class="bi bi-plus-lg"></i> Nuevo Aprendiz</a>
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
                        <i class="bi bi-list-ul"></i> Aprendices registrados
                        <span class="count-badge">{{ $apprentices->count() }}</span>
                    </div>
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="search" data-target="#table-apprentices" placeholder="Buscar aprendiz...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle" id="table-apprentices">
                        <thead>
                            <tr>
                                <th style="width:90px;">ID</th>
                                <th>Aprendiz</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Curso</th>
                                <th>Computador</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($apprentices as $apprentice)
                                <tr>
                                    <td><span class="id-pill">#{{ $apprentice->id }}</span></td>
                                    <td>
                                        <a href="{{ route('apprentice.show', $apprentice->id) }}" class="text-decoration-none text-reset">
                                            <div class="cell-main text-capitalize">{{ $apprentice->name }}</div>
                                            <div class="cell-sub">{{ optional($apprentice->course)->course_number ? 'Ficha ' . $apprentice->course->course_number : '' }}</div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="cell-line">
                                            <i class="bi bi-envelope"></i>
                                            <span>{{ $apprentice->email }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-line">
                                            <i class="bi bi-telephone"></i>
                                            <span>{{ $apprentice->number }}</span>
                                        </div>
                                    </td>
                                    <td>{{ optional($apprentice->course)->course_number ?? '—' }}</td>
                                    <td>{{ $apprentice->computer ? 'Equipo ' . $apprentice->computer->number : '—' }}</td>
                                    <td class="text-end">
                                        <div class="action-group">
                                            <a href="{{ route('apprentice.show', $apprentice->id) }}" class="btn-icon" title="Ver detalles"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('apprentice.edit', $apprentice->id) }}" class="btn-icon" title="Editar"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('apprentice.destroy', $apprentice->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este aprendiz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon btn-icon-danger" title="Eliminar"><i class="bi bi-trash3"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr data-empty-row>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <i class="bi bi-people"></i>
                                            <h6>Aún no hay aprendices registrados</h6>
                                            <p>Registra el primer aprendiz desde el formulario.</p>
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
                    <div class="panel-title"><i class="bi bi-plus-circle"></i> Registrar aprendiz</div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('apprentice.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="name">Nombre completo</label>
                            <i class="field-icon bi bi-person"></i>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Ej: María Gómez">
                        </div>

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="email">Correo electrónico</label>
                            <i class="field-icon bi bi-envelope"></i>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Ej: alumno@misena.edu.co">
                        </div>

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="number">Número de teléfono</label>
                            <i class="field-icon bi bi-telephone"></i>
                            <input type="text" id="number" name="number" value="{{ old('number') }}" placeholder="Ej: 3001234567">
                        </div>

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
                            <label class="label-modern" for="computer_id">Equipo de cómputo</label>
                            <i class="field-icon bi bi-pc-display"></i>
                            <select id="computer_id" name="computer_id">
                                <option value="">Seleccione un equipo</option>
                                @foreach($computers as $computer)
                                    <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>Equipo {{ $computer->number }} — {{ $computer->brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn-modern btn-modern-green w-100 justify-content-center">
                            <i class="bi bi-check2-circle"></i> Guardar aprendiz
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection