@extends('layouts.app')

@section('title', 'Áreas de Formación')

@section('content')
<div class="admin-module py-2">

    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-layers"></i></div>
            <div>
                <div class="module-eyebrow">Gestión Base</div>
                <h1 class="module-title">Áreas de Formación</h1>
                <p class="module-subtitle">
                    Administra las áreas o ambientes de formación del SENA.
                </p>
            </div>
        </div>

        <a href="{{ route('area.create') }}" class="btn-modern">
            <i class="bi bi-plus-lg"></i> Nueva Área
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4 mt-1">
        <div class="col-12">
            <div class="panel-card">

                <div class="panel-header">
                    <div class="panel-title">
                        <i class="bi bi-list-ul"></i> Áreas registradas
                        <span class="count-badge">{{ $areas->count() }}</span>
                    </div>

                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input
                            type="search"
                            data-target="#table-areas"
                            placeholder="Buscar área...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle" id="table-areas">
                        <thead>
                            <tr>
                                <th style="width:90px;">ID</th>
                                <th>Área</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($areas as $area)
                                <tr>
                                    <td>
                                        <span class="id-pill">#{{ $area->id }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('area.show', $area->id) }}"
                                           class="text-decoration-none text-reset">
                                            <div class="cell-main text-capitalize">
                                                {{ $area->name }}
                                            </div>
                                            <div class="cell-sub">
                                                Área de formación
                                            </div>
                                        </a>
                                    </td>

                                    <td class="text-end">
                                        <div class="action-group">
                                            <a href="{{ route('area.show', $area->id) }}"
                                               class="btn-icon"
                                               title="Ver detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('area.edit', $area->id) }}"
                                               class="btn-icon"
                                               title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('area.destroy', $area->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar esta área?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn-icon btn-icon-danger"
                                                        title="Eliminar">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr data-empty-row>
                                    <td colspan="3">
                                        <div class="empty-state">
                                            <i class="bi bi-layers"></i>
                                            <h6>Aún no hay áreas registradas</h6>
                                            <p>Registra la primera área utilizando el botón Nueva Área.</p>

                                            <a href="{{ route('area.create') }}" class="btn-modern">
                                                <i class="bi bi-plus-lg"></i> Registrar área
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($areas, 'links') && $areas->hasPages())
                    <div class="px-4 py-3 border-top d-flex justify-content-center">
                        {{ $areas->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>

</div>
@endsection
