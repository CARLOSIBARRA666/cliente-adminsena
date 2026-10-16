@extends('layouts.app')

@section('title', 'Equipos de Cómputo')

@section('content')
<div class="admin-module py-2">

    <!-- Encabezado del módulo -->
    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-pc-display"></i></div>
            <div>
                <div class="module-eyebrow">Gestión Base</div>
                <h1 class="module-title">Equipos de Cómputo</h1>
                <p class="module-subtitle">Administra los equipos y recursos tecnológicos de los ambientes.</p>
            </div>
        </div>
        <a href="#module-form" class="btn-modern"><i class="bi bi-plus-lg"></i> Nuevo Equipo</a>
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
                        <i class="bi bi-list-ul"></i> Equipos registrados
                        <span class="count-badge">{{ $computers->count() }}</span>
                    </div>
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="search" data-target="#table-computers" placeholder="Buscar equipo...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle" id="table-computers">
                        <thead>
                            <tr>
                                <th style="width:90px;">ID</th>
                                <th>Número</th>
                                <th>Marca</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($computers as $computer)
                                <tr>
                                    <td><span class="id-pill">#{{ $computer->id }}</span></td>
                                    <td>
                                        <a href="{{ route('computer.show', $computer->id) }}" class="text-decoration-none text-reset">
                                            <div class="cell-main">Equipo {{ $computer->number }}</div>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="cell-line">
                                            <i class="bi bi-cpu"></i>
                                            <span class="text-capitalize">{{ $computer->brand }}</span>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="action-group">
                                            <a href="{{ route('computer.show', $computer->id) }}" class="btn-icon" title="Ver detalles"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('computer.edit', $computer->id) }}" class="btn-icon" title="Editar"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este equipo?')">
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
                                            <i class="bi bi-pc-display"></i>
                                            <h6>Aún no hay equipos registrados</h6>
                                            <p>Registra el primer equipo de cómputo desde el formulario.</p>
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
                    <div class="panel-title"><i class="bi bi-plus-circle"></i> Registrar equipo</div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('computer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="f-control has-icon mb-3">
                            <label class="label-modern" for="number">Número del equipo</label>
                            <i class="field-icon bi bi-123"></i>
                            <input type="number" id="number" name="number" value="{{ old('number') }}" placeholder="Ej: 15">
                        </div>

                        <div class="f-control has-icon mb-4">
                            <label class="label-modern" for="brand">Marca</label>
                            <i class="field-icon bi bi-cpu"></i>
                            <input type="text" id="brand" name="brand" value="{{ old('brand') }}" placeholder="Ej: HP, Dell, Lenovo">
                        </div>

                        <button type="submit" class="btn-modern btn-modern-green w-100 justify-content-center">
                            <i class="bi bi-check2-circle"></i> Guardar equipo
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection