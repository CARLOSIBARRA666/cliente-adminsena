
@extends('layouts.app')

@section('title', 'Equipos de Cómputo')

@section('content')
<div class="admin-module py-2">

    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon">
                <i class="bi bi-pc-display"></i>
            </div>

            <div>
                <div class="module-eyebrow">Gestión Base</div>
                <h1 class="module-title">Equipos de Cómputo</h1>
                <p class="module-subtitle">
                    Administra los equipos y recursos tecnológicos de los ambientes.
                </p>
            </div>
        </div>

        <a href="{{ route('computer.create') }}" class="btn-modern">
            <i class="bi bi-plus-lg"></i> Nuevo Equipo
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4 mt-1">
        <div class="col-12">

            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="bi bi-list-ul"></i> Equipos registrados
                        <span class="count-badge">{{ $computers->count() }}</span>
                    </div>

                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="search"
                               data-target="#table-computers"
                               placeholder="Buscar equipo...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern align-middle" id="table-computers">
                        <thead>
                            <tr>
                                <th style="width:90px;">ID</th>
                                <th>Número</th>
                                <th>Marca</th>
                                <th>Imagen</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($computers as $computer)
                                <tr>
                                    <td>
                                        <span class="id-pill">#{{ $computer->id }}</span>
                                    </td>

                                    <td>
                                        <a href="{{ route('computer.show', $computer->id) }}"
                                           class="text-decoration-none text-reset">
                                            <div class="cell-main">
                                                Equipo {{ $computer->number }}
                                            </div>
                                        </a>
                                    </td>

                                    <td>
                                        <div class="cell-line">
                                            <i class="bi bi-cpu"></i>
                                            <span class="text-capitalize">
                                                {{ $computer->brand }}
                                            </span>
                                        </div>
                                    </td>

                                    <td>
                                     @if (!empty($computer->imagen_url))
                                      <img
                                            src="{{ $computer->imagen_url }}"
                                            alt="Imagen del equipo"
                                            style="width: 65px; height: 50px; object-fit: cover; border-radius: 8px;">
                                     @else
                                        <span class="text-muted">Sin imagen</span>
                                     @endif
                                    </td>

                                    <td class="text-end">
                                        <div class="action-group">

                                            <a href="{{ route('computer.show', $computer->id) }}"
                                               class="btn-icon"
                                               title="Ver detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('computer.edit', $computer->id) }}"
                                               class="btn-icon"
                                               title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('computer.destroy', $computer->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar este equipo?')">
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
                                <tr>
                                    <td colspan="4">
                                        <div class="empty-state">
                                            <i class="bi bi-pc-display"></i>
                                            <h6>Aún no hay equipos registrados</h6>
                                            <p>
                                                Registra el primer equipo de cómputo
                                                desde el botón Nuevo Equipo.
                                            </p>
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
