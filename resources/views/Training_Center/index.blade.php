
@extends('layouts.app')

@section('title', 'Centros de Formación')

@section('content')
<div class="admin-module py-2">

    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-buildings"></i></div>
            <div>
                <div class="module-eyebrow">Gestión Base</div>
                <h1 class="module-title">Centros de Formación</h1>
                <p class="module-subtitle">Administra los centros de formación del SENA y sus ubicaciones.</p>
            </div>
        </div>

        <a href="{{ route('training_center.create') }}" class="btn-modern">
            <i class="bi bi-plus-lg"></i> Nuevo Centro
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4 mt-1">

        <div class="col-12">
            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="bi bi-list-ul"></i> Centros registrados
                        <span class="count-badge">{{ $training_centers->count() }}</span>
                    </div>

                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="search" data-target="#table-training-centers" placeholder="Buscar centro...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle" id="table-training-centers">
                        <thead>
                            <tr>
                                <th style="width:90px;">ID</th>
                                <th>Nombre</th>
                                <th>Ubicación</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($training_centers as $training_center)
                                <tr>
                                    <td>
                                        <span class="id-pill">#{{ $training_center->id }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('training_center.show', $training_center->id) }}" class="text-decoration-none text-reset">
                                            <div class="cell-main text-capitalize">{{ $training_center->name }}</div>
                                        </a>
                                    </td>

                                    <td>
                                        <div class="cell-line">
                                            <i class="bi bi-geo-alt"></i>
                                            <span>{{ $training_center->location }}</span>
                                        </div>
                                    </td>

                                    <td class="text-end">
                                        <div class="action-group">
                                            <a href="{{ route('training_center.show', $training_center->id) }}" class="btn-icon" title="Ver detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('training_center.edit', $training_center->id) }}" class="btn-icon" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('training_center.destroy', $training_center->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este centro?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-icon btn-icon-danger" title="Eliminar">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr data-empty-row>
                                    <td colspan="4">
                                        <div class="empty-state">
                                            <i class="bi bi-buildings"></i>
                                            <h6>Aún no hay centros registrados</h6>
                                            <p>Registra el primer centro de formación desde el botón Nuevo Centro.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
